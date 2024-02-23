<?php echo $this->Html->script('jquery.maskedinput.min'); ?>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<?php echo $this->Html->script(['excanvas.min']); ?>
<![endif]-->

<?php
echo $this->Html->script([
    'jquery-ui.custom.min', 
    
    //'jquery.ui.touch-punch.min'
    ]);
?>
<!-- ace scripts -->
<?php echo $this->Html->script(['ace-elements.min', 'ace.min']); ?>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {



        //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
        //but sometimes it brings up errors with normal resize event handlers
        //$.resize.throttleWindow = false;


        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
        //so disable dragging when clicking on label
        var agent = navigator.userAgent.toLowerCase();
        if (ace.vars['touch'] && ace.vars['android']) {
            $('#tasks').on('touchstart', function (e) {
                var li = $(e.target).closest('#tasks li');
                if (li.length == 0)
                    return;
                var label = li.find('label.inline').get(0);
                if (label == e.target || $.contains(label, e.target))
                    e.stopImmediatePropagation();
            });
        }

        $('#tasks').sortable({
            opacity: 0.8,
            revert: true,
            forceHelperSize: true,
            placeholder: 'draggable-placeholder',
            forcePlaceholderSize: true,
            tolerance: 'pointer',
            stop: function (event, ui) {
                //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                $(ui.item).css('z-index', 'auto');
            }
        }
        );
        $('#tasks').disableSelection();
        $('#tasks input:checkbox').removeAttr('checked').on('click', function () {
            if (this.checked)
                $(this).closest('li').addClass('selected');
            else
                $(this).closest('li').removeClass('selected');
        });


        //show the dropdowns on top or bottom depending on window height and menu position
        $('#task-tab .dropdown-hover').on('mouseenter', function (e) {
            var offset = $(this).offset();

            var $w = $(window)
            if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                $(this).addClass('dropup');
            else
                $(this).removeClass('dropup');
        });

    });
    $(function () {

        var path = window.location.pathname;
        path = path.replace(/\/$/, "");
        path = decodeURIComponent(path);
        $("#sidebar a").each(function () {

            var href = $(this).attr('href');
            if (path === href) {
                $(this).closest('li').addClass('active');
                var treeviewmenu = $(this).closest('li').parent();
                treeviewmenu.parent().addClass('active');
            }
        });
    });
</script>
