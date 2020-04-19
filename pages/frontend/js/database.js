//===================================\\
//           Copyright 2017          \\
//        Aditya Khoirul Anam        \\
//           LIMAS Project           \\
//===================================\\


/**
 *  Example using XAselect
 *
 *  XAselect({"processor" : "members", "xdata" : ""}, function(data, status) {
 *      console.log(data); // Do what you want with the data returned
 *  });

 *  XAselect({"processor" : "members", "xdata" : "Ferdinand"}, function(data, status) {
 *      console.log(data); // Do what you want with the data returned
 *  });
 */
var xhr;
function XAselect(args, callback1, callback2)
{
    xjson = JSON.stringify(args["data"]);
    if (typeof xhr != "undefined") {
        //console.log(xhr.abort());
        xhr.abort();
    }

    xhr = $.post(baseurl + "processor/" + args["processor"] + ".php",
    {
        action: "read",
        data: xjson
    })
    .done(callback1)
    .fail(callback2);
}

/**
 *  Example using XAinsert
 *
 *  XAinsert({"processor" : "members", "data" : [{"col1" : "A", "col2" : "B", "col3" : "C"}]}, function(data, status) {
 *      console.log(data); // Do what you want with the data returned
 *  });

 *  var datas = [{"id" : "111111111", "name" : "AAAAAAAAA", "address" : "XXXXXXXXX", "phone" : "000000000"}];
 *  XAinsert({"processor" : "members", "data" : datas}, function(data, status) {
 *      console.log(data); // Do what you want with the data returned
 *  });
 */
function XAinsert(args, callback)
{
    xjson = JSON.stringify(args["data"]);
    $.post(baseurl + "processor/" + args["processor"] + ".php",
    {
        action: "insert",
        data: xjson
    })
    .done(callback);
}

/**
 *  Example using XAupdate
 *
 *  XAupdate({"processor" : "members", "data" : [{"col1" : "A", "col2" : "B", "col3" : "C"}]}, function(data, status) {
 *      console.log(data); // Do what you want with the data returned
 *  });

 *  var datas = [{"id" : "111111111", "name" : "AAAAAAAAA", "address" : "XXXXXXXXX", "phone" : "000000000"}];
 *  XAupdate({"processor" : "members", "data" : datas}, function(data, status) {
 *      console.log(data); // Do what you want with the data returned
 *  });
 */
 function XAupdate(args, callback)
 {
     xjson = JSON.stringify(args["data"]);
     $.post(baseurl + "processor/" + args["processor"] + ".php",
     {
         action: "update",
         data: xjson
     })
     .done(callback);
 }

 /**
  *  Example using XAdelete
  *
  *  XAdelete({"processor" : "members", "data" : ["1", "2", "3"]}, function(data, status) {
  *      console.log(data); // Do what you want with the data returned
  *  });
  */
 function XAdelete(args, callback)
 {
     xjson = JSON.stringify(args["data"]);
     $.post(baseurl + "processor/" + args["processor"] + ".php",
     {
         action: "delete",
         data: xjson
     })
     .done(callback);
 }

function XAVIER(args, callback1, callback2, callback3)
{
    xjson = JSON.stringify(args["data"]);
    if (typeof xhr != "undefined") {
        //console.log(xhr.abort());
        xhr.abort();
    }

    xhr = $.post(args["processor"] + ".php",
    {
        data: xjson
    })
    .done(callback1)
    .fail(callback2)
    .always(callback3);
}

 /**
  *  Example using XAtable
  */
 function XATtable()
 {

 }

 /**
  *  Example using XAselect
  */
 function XATselect()
 {

 }

 /**
  *  Example using XAinput
  */
 function XATinput()
 {

 }
