$("#province").on("change", function () {
    provinceId = $("#province").val();
    $.get("{{route('admin.region.city')}}", {id: provinceId, html: true},
        function (data) {
            $("#city").html(data)
        });
});
$("#city").on("change", function () {
    cityId = $("#city").val();
    $.get("{{route('admin.region.area')}}", {id: cityId, html: true},
        function (data) {
            $("#area").html(data)
        });
});
$("#datepicker").datepicker({format: 'yyyy-mm-dd'});