const size={
    SMALL: 'small',
    NORMAL: 'default',
    LARGE: 'large',
    EXTRA_LARGE: 'extra-large'
};
const bootbox_type={
    DEFAULT: "btn-default",
    PRIMARY: "btn-primary",
    SUCCESS: "btn-success",
    WARNING: "btn-warning",
    DANGER:  "btn-danger"
};
function BootboxModal(title, url, closebutton=true, msize=size.SMALL,type=bootbox_type.PRIMARY,backdrop=false,onEscape=true) {
    let dialog = bootbox.dialog({
        size: msize,
        type: type,
        backdrop: backdrop,
        onEscape: onEscape,
        closeButton: closebutton,
        tabindex: false,
        footer: 'true',
        //className: 'btn-danger',
        title: title,
        message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>',
    });
    dialog.init(function(){
        $(".bootbox.modal").find(".modal-header").addClass(type);
        $(".bootbox.modal").removeAttr("tabindex");
        $(".bootbox.modal").find(".modal-footer").prepend('Footer');
        setTimeout(function(){
            dialog.find('.bootbox-body').load(url);
        }, 10);
    });
    $(".modal-title").html("<i class='fa fa-clone'></i> "+title);
    /*dialog.on("shown.bs.modal", function() {
        dialog.attr("id", "modal");
    });*/
}