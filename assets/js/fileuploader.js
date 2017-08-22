$(document).ready(function() {

    function Event(name) {
        this.name = name;
        this.callbacks = [];
    }

    Event.prototype.registerCallback = function (callback) {
        this.callbacks.push(callback);
    };

    function FoxEvents() {
        this.events = {};
    }

    FoxEvents.prototype.registerEvent = function (eventName) {
        this.events[eventName] = new Event(eventName);
    };

    FoxEvents.prototype.dispatchEvent = function (eventName, eventArgs) {
        if (this.events[eventName] === undefined) return;

        this.events[eventName].callbacks.forEach(function (callback) {
            callback(eventArgs);
        });
    };

    FoxEvents.prototype.addEventListener = function (eventName, callback) {
        this.events[eventName].registerCallback(callback);
    };

    var FoxEvent = new FoxEvents();

    (function () {
        "use strict";

        var _g = { uAll: false};

        /// Upload List Class
        var uploadList = (function(){
            //Private items store
            var _items = [];
            var that = this;

            function updateLabel(){
                $("#upFilesRemain").text(_items.length);
            }

            return {
                //Add a item to the front of the array
                addItem: function (item) {
                    _items.push(item);
                    updateLabel();
                },

                //Find a specific item based on item element index
                findItem: function(data){
                    for (var index in _items) {
                        if (_items.hasOwnProperty(index)) {
                            if (_items[index].id.context === data.context)
                                return { idx: index, item: _items[index] };
                        }
                    }
                },

                //Remove a specific item based on item element index
                removeItem: function (data) {
                    var item = this.findItem(data);

                    if(item !== undefined)
                        _items.splice(item.idx, 1);

                    updateLabel();
                },

                //Get all items array
                getItems: function () {
                    return _items;
                },

                //Update the file remaing label
                updateLabel: function() {
                    updateLabel();
                },

                //Get Items Length
                length: function(){
                    return _items.length;
                },

                //Get the first item of the items array and remove it
                shift: function(){
                    return _items.shift();
                },

                //Get the last item of the items array and remove it
                pop: function(){
                    return _items.pop();
                },

                //Set the Upload Item XHR Object
                setXHR: function(data, xhr){
                    var item = this.findItem(data);
                    if(item !== undefined)
                        item.item.xhr = xhr;
                },

                //Get the Upload Item XHR Object
                getXHR: function(data){
                    var item = this.findItem(data);
                    if(item !== null)
                        return item.item.xhr;
                },

                //Abort Upload
                abort: function(data){
                    var xhr = this.getXHR(data);
                    if(xhr !== undefined && xhr !== null){
                        xhr.abort();
                        this.removeItem(data);
                    }
                },

                //Stop all running uploads and clear the entire list
                clear: function(){
                    this.getItems().forEach(function(item, index, array){
                        if(item.xhr !== undefined && item.xhr !== null)
                            item.xhr.abort();
                        item.remove('clear');
                    });

                    _items = [];
                    updateLabel();
                    $("#upSpeed").text("0.00");
                },

                //Trigger the event Upload All
                uploadAll: function(){
                    _g["uAll"] = true;
                    FoxEvent.dispatchEvent("UploadAll.Do");
                }
            };
        })();

        //Math Round (?)
        function round(number, precision) {
            var factor = Math.pow(10, precision);
            var tempNumber = number * factor;
            var roundedTempNumber = Math.round(tempNumber);
            return roundedTempNumber / factor;
        }

        //Creates the unique id for the object
        function guid() {
            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
            }
            return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
                s4() + '-' + s4() + s4() + s4();
        }

        //Core for the file upload
        // first Argument: Node Element CSS Selector
        $('#fileupload').fileupload({
            //Server return type
            dataType: 'json',

            //Add File Event
            add: function (e, data) {

                //Create the item element
                var item = $('<li role="listitem" class="list-group-item fileUpload_itemContainer"></li>');

                //Set the data context
                data.context = item;

                //set data-guid to the element making it unique
                item.attr('data-guid', guid());

                //set item childs
                item.html('<div role="progressbar" class="fileUpload_ProgressBar"></div><div role="textbox" class="fileUpload_fileNameContainer">File.ext</div><div role="menubar"><span role="button" class="btn btn-success">Upload</span><span role="button" class="btn btn-danger">Remove</span></div>');

                //create the upload object
                var uploadObject = {
                    //our index
                    id: data,

                    //our ajax
                    xhr: null,

                    //submit function for make clicking work well
                    submit: function () {
                        uploadList.setXHR(uploadObject.id, uploadObject.id.submit());
                    },

                    //remove function
                    remove: function () {

                        //remove relative item
                        item.remove();
                        if(arguments.length > 0)
                            if(arguments[0] !== 'clear')
                            //call uploadlist class to remove item from array
                                uploadList.removeItem(uploadObject.id);
                    }
                };

                //store filename in this variable
                var fileName = data.files[0].name;

                //Set the filename inside the html element
                item.find(".fileUpload_fileNameContainer").text(fileName);

                //append our item to: html file list
                item.appendTo("#fileUpload_files");

                //
                item.find(".btn-success").click(function () { uploadObject.submit(); });

                //
                item.find(".btn-danger").click(function () { uploadObject.remove(); });

                //
                uploadList.addItem(uploadObject);
            },

            // File done Event
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    var rm = data.context.find("[role=menubar]");
                    rm.html("Upload finalizado <span class='btn btn-default'>Fechar</span>");
                    rm.find('span').click(function () {
                        data.context.remove();
                    });
                });

                uploadList.removeItem(data);
            },

            always: function(e, data) {
                if (_g["uAll"])
                    FoxEvent.dispatchEvent("UploadAll.Do");
            },

            // File progress Event
            progress: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                data.context.find("[role=progressbar]").css('width', progress + '%');
            },

            // File failed Event
            fail: function (e, data) {
                data.context.css('background-color', 'rgba(255,0,0, .25)');

                var rm = data.context.find("[role=menubar]");
                rm.html("Upload falhou <span class='btn btn-default'>Fechar</span>");
                rm.find('span').click(function () {
                    data.context.remove();
                });
            },

            // Sending event
            send: function (e, data) {
                data.context.css('background-color', 'rgba(102, 255, 255, .25)');

                var rm = data.context.find("[role=menubar]");
                rm.html("Arquivo sendo enviado <span class='btn btn-default'>Abortar</span>");
                rm.find('span').click(function () {
                    uploadList.abort(data);
                });
            },

            // Global progress event
            progressall: function (e, data) {
                var kbs = round(data.bitrate / 1024, 2);
                $("#upSpeed").text(kbs);

                uploadList.updateLabel();
            }
        });

        $("#submitAll").click(function () {
            if (uploadList.length() > 0) {
                uploadList.uploadAll();
            }
        });

        $("#removeAll").click(function () {
            if (uploadList.length() > 0) {
                uploadList.clear();
            }
        });

        FoxEvent.registerEvent("UploadAll.Do");

        FoxEvent.addEventListener("UploadAll.Do", function(){
            if(uploadList.length() > 0){
                //uploadList.getItems()[0].id.context.find(".btn-success").click();
                uploadList.getItems()[0].submit();
            }
            else
                _g["uAll"] = false;
        });

    })();
});