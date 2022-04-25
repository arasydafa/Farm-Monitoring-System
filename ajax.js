$(document).ready(function() {
    selesai();
});

function selesai() {
    setTimeout(function() {
        update();
        selesai();
    }, 200);
}

function update() {
    $.getJSON("json.php", function(data) {
        $("table").empty();
        var no = 1;
        $.each(data.result, function() {
            $(".table").append(
                "<tr><td>" +
                no++ +
                "</td><td>" +
                this["kelembaban"] +
                "</td><td>" +
                this["suhu"] +
                "</td><td>" +
                this["amonia"] +
                "</td><td>" +
                this["waktu"] +
                "</td></tr>"
            );
        });
    });
}