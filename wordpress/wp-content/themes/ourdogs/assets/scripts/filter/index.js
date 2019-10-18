import $ from "jquery";

console.log($("form"));
$("form").on("submit change", function(e) {
    e.preventDefault();

    var formFilter = $(this);
    console.log(formFilter);

    $.ajax({
        url: formFilter.attr("action"),
        data: formFilter.serialize(),
        type: formFilter.attr("method"),
        success: function(data) {
            // console.log(data);
            $(".grid--dogs-all").html();
            $(".grid--dogs-all").html(data);
        },
    });

    return false;
});
