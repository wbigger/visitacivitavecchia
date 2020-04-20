var app = {
    baseURL: "./data.php",
    textURL: "./text.php",
    productList: {},
    init: function () {
        console.log("init here!");
        // Get the product list from the database
        app.getProductList();
    },
    getProductList: function () {
        let query_string = window.location.search;
        console.log(query_string);
        // make a HTTP GET request
        $.getJSON(`${app.baseURL}${query_string}`)
            .done(app.onSuccess)
            .fail(app.onError);
    },
    onSuccess: function (jsonData) {
        console.log(jsonData);
        // save data in a local variable
        app.productList = jsonData.productList;
        let poi = app.productList[0];
        $("#poi_name").text(poi.name);
        $("#poi_name_subtitle").text(poi.name_subtitle);
        $(".poi_video").attr("src", poi.video_url);
        $("#poi_img_1").attr("src", poi.img1_url);
        // call my php converter that takes in input a URL and return the text
        $.get(`${app.textURL}?link=${poi.text1_url}`).done(
            (txt) => $("#poi_text_1").text(txt)
        );
        $("#poi_img_2").attr("src", poi.img2_url);
        $.get(`${app.textURL}?link=${poi.text2_url}`).done(
            (txt) => $("#poi_text_2").text(txt)
        );
        $("#poi_img_3").attr("src", poi.img3_url);
        $.get(`${app.textURL}?link=${poi.text3_url}`).done(
            (txt) => $("#poi_text_3").text(txt)
        );
    },
    onError: function (e) {
        console.log("error!");
        console.log(JSON.stringify(e));
    }
};

$(document).ready(app.init);
