$(document).ready(function() {
    $(document).on("click", "#return_list", function() {
        $.get("/controller/c_listProd.php", { cat: 'all' }, function(response) {
            $("#outer").html(response); 
        });
    });
});

$(document).ready(function() {
    $(document).on("change", "#categoria_filter", function() {
        $.get("/controller/c_listProd.php", { cat: $("#categoria_filter").val() }, function(response) {
            $("#outer").html(response); 
        });
    });

    $(document).on("click", ".goto_detall", function() {
        $.get("/controller/c_detallProd.php", { prod: this.title }, function(response) {
            $("#outer").html(response); 
        });
    });
});

$(document).ready(function() {
    $(document).on("click", ".addCarro", function() {
        $.get("/controller/c_carro.php", { id: $(".id").val(), name: $(".pName").html(), quant: $(".quant").val(), pu: $("#preu").attr("data-price"), mode: "add" }, function(response) {
            $("#modal-data").html(response);
        });
    });
});

$(document).ready(function() {
    $(document).on("click", ".rmCarro", function() {
        $.get("/controller/c_carro.php", { id: this.value, mode: "rm-id" }, function(response) {
            $("#modal-data").html(response);
        });
    });
    $(document).on("click", ".modCarro", function() {
        $.get("/controller/c_carro.php", { id: this.value, quant: $("#quant-"+this.value).val(), mode: "modify" }, function(response) {
            $("#modal-data").html(response);
        });
    });
    $(document).on("click", "#vaciarCarro", function() {
        $.get("/controller/c_carro.php", { mode: "rm-all" }, function(response) {
            $("#modal-data").html(response);
        });
    });
});