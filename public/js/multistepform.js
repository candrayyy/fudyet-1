$(() => {
    const $sections = $(".form-section");

    const navigateTo = (index) => {
        $sections.removeClass("current").eq(index).addClass("current");
        $(".form-navigation .previous").toggle(index > 0);
        var atTheEnd = index >= $sections.length - 1;
        $(".form-navigation .next").toggle(!atTheEnd);
        $(".form-navigation [type=submit]").toggle(atTheEnd);
    };

    const curIndex = () => {
        return $sections.index($sections.filter(".current"));
    };

    $(".form-navigation .previous").click(() => {
        navigateTo(curIndex() - 1);
    });

    $(".form-navigation .next").click(() => {
        $(".recommendation-form")
            .parsley()
            .whenValidate({
                group: "block-" + curIndex(),
            })
            .done(() => {
                navigateTo(curIndex() + 1);
            });
    });

    $sections.each((index, section) => {
        $(section)
            .find(":input")
            .attr("data-parsley-group", "block-" + index);
    });

    navigateTo(0);
});
