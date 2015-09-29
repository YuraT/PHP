function main() {
    $(".image").hide();
    $("#show").click(function() {
        $(".image").show();
        $("#show").hide();
    });
}

$(document).ready(main);