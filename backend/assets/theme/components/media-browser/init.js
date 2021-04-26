var media_browser_called = false;
var media_browser_path = '/';
var media_browser_view_type = 'list';
var media_browser_popup_ = 'single';
var media_browser_frame_item;
var media_browser_frame_choose = 'single';

$(document).ready(function () {
    mediaBrowserFrame();
});

function mediaBrowserInit() {
    media_browser_called = true;

    var path_name = mbUrlParameter('path');
    var view_type = mbUrlParameter('view');

    if (path_name != undefined && path_name != '') {
        path_name = path_name.replace(/\/$/, "");
        media_browser_path = path_name;
    }

    if (view_type != undefined && view_type == 'grid') {
        media_browser_view_type = 'grid';
    }

    // Select box
    mediaBrowserSelect();

    // Toggle areas
    $(document).on('click', '[media-browser-toggle]', function () {
        var action = $(this).attr('media-browser-toggle');

        if (action != undefined && action != '') {
            var block_folder = $('.media-browser-add-folder');
            var block_upload = $('.media-browser-upload');

            if (action == 'folder') {
                block_folder.toggleClass('animated fadeIn');
            } else if (action == 'upload') {
                block_upload.toggleClass('animated fadeIn');
            }
        }
    });

    // Popup close
    $(document).on('click', '[media-browser-popup-close]', function () {
        mediaBrowserPopup('hide');
    });

    // File info show
    $(document).on('click', '[media-browser-info]', function () {
        var file_name = $(this).attr('media-browser-info');

        if (file_name != undefined && file_name != '') {
            var item = $('[media-browser-info-block="' + file_name + '"]');
            mediaBrowserPopup('show', item);
        }
    });

    // Folder info show
    $(document).on('click', '[media-browser-path-info]', function (e) {
        e.preventDefault();
        var file_name = $(this).attr('media-browser-path-info');

        if (file_name != undefined && file_name != '') {
            var item = $('[media-browser-info-block="' + file_name + '"]');
            mediaBrowserPopup('show', item);
        }
    });

    // Submit file edit form
    $(document).on('submit', '.media-browser-action-form', function (e) {
        e.preventDefault();

        var $this = $(this);
        var form_data = $this.serialize();
        var action_type = $this.find('input[name="action_type"]');
        var $button = $this.find('.media-browser-action-btn');

        $.ajax({
            url: media_browser_url + 'actions/?path=' + media_browser_path,
            type: "POST",
            data: form_data,
            dataType: "json",
            beforeSend: function () {
                $button.addClass('with-preloader-icon');
            },
            success: function (data) {
                $button.removeClass('with-preloader-icon');

                if (data.message != undefined && data.message != '') {
                    var message = data.message;

                    if (data.success) {
                        mediaBrowserPopup('hide');
                        mediaBrowserAjax();
                        toastr.success(message, 'Success', { timeOut: 10000 });

                        if (action_type != undefined && action_type.val() == 'create_folder') {
                            $('input[name="folder_name"]').val('');
                        }
                    } else {
                        toastr.error(message, 'Error', { timeOut: 10000 });
                    }
                }
            },
            error: function () {
                alert(ajax_error_msg);
            }
        });
    });

    // Folder open
    $(document).on('click', '[media-browser-open-dir]', function (e) {
        var folder_icon = $(".media-browser-table-item-info");

        if (!folder_icon.is(e.target) && folder_icon.has(e.target).length === 0) {
            var path_name = $(this).attr('media-browser-open-dir');

            if (path_name != undefined && path_name != '') {
                mediaBrowserAjax(path_name);
            } else {
                alert('Incorrect folder path!');
            }
        }
    });

    // Quick actions
    $(document).on('click', '[media-browser-quick-action]', function () {
        var items = [];
        var quick_action = $(this).attr('media-browser-quick-action');

        if (quick_action != undefined && quick_action != '') {
            var objects = $('[media-browser-selected]');

            if (objects != undefined && objects.length > 0) {
                objects.each(function () {
                    var value = $(this).attr('media-browser-selected');

                    if (value != undefined && value != '') {
                        items.push(value);
                    }
                });
            }
        }

        if (items.length > 0) {
            Swal.fire({
                title: 'Delete',
                text: 'Selected items will be deleted. Continue?',
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#ff3d60",
                confirmButtonText: 'Yes'
            }).then(function (action) {
                if (action.isConfirmed) {
                    $.ajax({
                        url: media_browser_url + 'actions/?path=' + media_browser_path,
                        type: "POST",
                        data: {
                            action_type: quick_action,
                            names: items
                        },
                        dataType: "json",
                        success: function (data) {
                            if (data.message != undefined && data.message != '') {
                                var message = data.message;

                                if (data.success) {
                                    mediaBrowserAjax();
                                    toastr.success(message, 'Success', { timeOut: 10000 });
                                } else {
                                    toastr.error(message, 'Error', { timeOut: 10000 });
                                }
                            }
                        }
                    })
                }
            });
        }
    });

    // View type buttons
    $(document).on('click', '.media-browser-view-btn', function () {
        var type = $(this).attr('media-browser-view');

        if (type != undefined && type != '') {
            media_browser_view_type = type;
            mediaBrowserViewtype();
        }
    });

    // Image preview on table
    $(document).on('mouseenter mouseleave', '.media-browser-list-image-preview', function (e) {
        var url = $(this).attr('media-browser-list-image-preview');

        if (url != undefined && url != '') {
            var img = $(this).children('img');
            var img_tag = '<img src="' + url + '" alt="image">';

            if (img != undefined && img.length > 0) {

            } else {
                $(this).append(img_tag);
            }

            if (e.type == 'mouseenter') {
                $(this).addClass('hover');
            } else if (e.type == 'mouseleave') {
                $(this).removeClass('hover');
            }
        }
    });

    // Upload area
    $(document).on('change', '#media-broser-upload-area', function () {
        var files = this.files;
        var label = $('#media-broser-upload-label');

        if (files != undefined && files.length > 0) {
            var names = [];

            if (files.length > 1) {
                label.text(files.length + ' files selected');
            } else {
                for (var i = 0; i < files.length; i++) {
                    names.push(files[i].name);
                }

                label.text(names.join(', '));
            }
        } else {
            label.empty();
        }
    });

    // Submit upload form
    $(document).on('submit', '.media-browser-upload-form', function (e) {
        e.preventDefault();

        var $this = $(this);
        var $input = $('#media-broser-upload-area');
        var $label = $('#media-broser-upload-label');
        var label_name = $label.attr('data-label');
        var $button = $this.find('.media-browser-action-btn');
        var $message_area = $this.find('.media-browser-upload-form-msg');

        var file_input = $("#media-broser-upload-area").get(0);
        var files = file_input.files;

        // Begin form data
        if (files.length > 0) {
            var data = new FormData();
            data.append('action_type', 'upload_file');

            for (var i = 0; i < files.length; i++) {
                data.append(files[i].name, files[i]);
            }

            $.ajax({
                type: "POST",
                url: media_browser_url + 'actions/?path=' + media_browser_path,
                contentType: false,
                processData: false,
                data: data,
                dataType: "json",
                beforeSend: function () {
                    $message_area.empty();
                    $button.addClass('with-preloader-icon');
                },
                success: function (data) {
                    $button.removeClass('with-preloader-icon');

                    if (data.success) {
                        $input.val('');
                        $label.text(label_name);
                        $message_area.html('<p>' + data.message + '</p>');

                        mediaBrowserAjax();
                    } else {
                        $message_area.html('<p class="text-danger">' + data.message + '</p>');
                    }

                    if (data.toastr != undefined && data.toastr != '') {
                        if (data.success) {
                            toastr.success(data.toastr, 'Success', { timeOut: 10000 });
                        } else {
                            toastr.error(data.toastr, 'Error', { timeOut: 10000 });
                        }
                    }
                },
                error: function () {
                    alert(ajax_error_msg);
                }
            });
        }
    });

    // Run
    mediaBrowserRun();
}

function mediaBrowserRun() {
    mediaBrowserViewtype();
    mediaBrowserAjax();
}

function mediaBrowserSelect() {
    var selected_icon_attr = 'media-browser-selected';
    var selected_icon_class = 'ri-checkbox-fill';
    var unselected_icon_class = 'ri-checkbox-blank-line';

    // Select all
    $(document).on('click', '[media-browser-select-all]', function () {
        var icon = $(this);
        var parent = icon.closest('[media-browser-block]');
        var checked = icon.attr('media-browser-select-all');

        if (parent != undefined && parent.length > 0) {
            var items = parent.find('[media-browser-select]');

            items.each(function () {
                var value = $(this).attr('media-browser-select');

                if (checked != undefined && checked == 'checked') {
                    icon.attr('media-browser-select-all', 'none');
                    icon.removeClass(selected_icon_class).addClass(unselected_icon_class);
                    $(this).removeClass(selected_icon_class).addClass(unselected_icon_class);
                    $(this).removeAttr(selected_icon_attr);
                    $(this).closest('tr').removeClass('media-browser-table-selected');

                } else {
                    icon.attr('media-browser-select-all', 'checked');
                    icon.removeClass(unselected_icon_class).addClass(selected_icon_class);
                    $(this).removeClass(unselected_icon_class).addClass(selected_icon_class);
                    $(this).attr(selected_icon_attr, value);
                    $(this).closest('tr').addClass('media-browser-table-selected');
                }
            });

            mediaBroserPopupButtonDisable();
        }
    });

    // Select one
    $(document).on('click', '[media-browser-select]', function () {
        var $this = $(this);
        var parent = $this.closest('[media-browser-block]');
        var checked = $this.attr(selected_icon_attr);
        var value = $this.attr('media-browser-select');

        if (parent != undefined && parent.length > 0) {
            var $item = $('[media-browser-select="' + value + '"]');
            var all_item = parent.find('[media-browser-select-all]');

            if (checked != undefined) {
                $item.removeClass(selected_icon_class).addClass(unselected_icon_class);
                $item.removeAttr(selected_icon_attr);
                $item.closest('tr').removeClass('media-browser-table-selected');
            } else {
                $item.removeClass(unselected_icon_class).addClass(selected_icon_class);
                $item.attr(selected_icon_attr, value);
                $item.closest('tr').addClass('media-browser-table-selected');
            }

            if (all_item != undefined && all_item.length > 0) {
                var items = parent.find('[media-browser-select]');
                var items_selected = parent.find('[' + selected_icon_attr + ']');
                var items_count = parseInt(items.length);
                var selected_count = parseInt(items_selected.length);

                if (!isNaN(items_count) && !isNaN(selected_count) && items_count == selected_count) {
                    all_item.attr('media-browser-select-all', 'checked');
                    all_item.removeClass(unselected_icon_class).addClass(selected_icon_class);
                } else {
                    all_item.attr('media-browser-select-all', 'none');
                    all_item.removeClass(selected_icon_class).addClass(unselected_icon_class);
                }
            }

            mediaBroserPopupButtonDisable();
        }
    });
}

function mediaBrowserAjax(path_name) {
    var data = {};

    var table_tbody = $('.media-browser-table > tbody');
    var table_tfoot = $('.media-browser-table > tfoot');

    var grid_items_block = $('.media-browser-grid-in');
    var grid_notfound = $('.media-browser-grid-view .media-browser-table-notfound');

    var popup = $('.media-browser-info-popup');
    var preloader = $('.media-browser-list-preloader');

    if (path_name != undefined && path_name != '') {
        data.path = path_name;
    } else {
        data.path = media_browser_path;
    }

    if (typeof media_browser_url !== undefined) {
        $.ajax({
            url: media_browser_url + 'get/',
            type: "GET",
            data: data,
            dataType: "json",
            beforeSend: function () {
                preloader.show();
                table_tfoot.hide();
            },
            success: function (data) {
                table_tbody.empty();
                grid_items_block.empty();
                var files_count = parseInt(data.files_count);

                if (!isNaN(files_count)) {
                    $('[media-browser-text="title"]').text(files_count + ' files');

                    if (files_count > 0) {
                        table_tfoot.hide();
                        grid_notfound.hide();
                    } else {
                        table_tfoot.show();
                        grid_notfound.show();
                    }
                }

                if (data.path != undefined && data.path != '') {
                    media_browser_path = data.path;
                }

                if (data.folders_list != undefined && data.folders_list != '') {
                    table_tbody.append(data.folders_list);
                }

                if (data.folders_grid != undefined && data.folders_grid != '') {
                    grid_items_block.append(data.folders_grid);
                }

                if (data.files_list != undefined && data.files_list != '') {
                    table_tbody.append(data.files_list);
                }

                if (data.files_grid != undefined && data.files_grid != '') {
                    grid_items_block.append(data.files_grid);
                }

                if (data.infos != undefined && data.infos != '') {
                    popup.html(data.infos);
                }

                if (data.path_list != undefined && data.path_list != '') {
                    var ul = $('.media-browser-link > ul');
                    ul.empty();

                    $.each(data.path_list, function (path, name) {
                        var li = '<li media-browser-open-dir="' + path + '">';

                        if (path == '/') {
                            li += '<i class="ri-home-3-line"></i>';
                        }

                        li += name;
                        li += '</li>';

                        ul.append(li);
                    });
                }

                preloader.hide();
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    }
}

function mediaBrowserPopup(action, block) {
    var popup = $('.media-browser-info-popup');
    var item = $('.media-browser-popup-item');

    if (action != undefined && action == 'show') {
        if (block != undefined && block.length > 0) {
            popup.show();
            block.fadeIn().addClass('animated slideInDown');
        } else {
            alert('An error occurred while retrieving information. Please try again.');
        }
    } else {
        popup.hide();
        item.hide().removeClass('animated slideInDown');
    }
}

function mediaBrowserViewtype() {
    $('[media-browser-view]').removeClass('active');
    $('[media-browser-view="' + media_browser_view_type + '"]').addClass('active');
}

function mediaBrowserFrame() {
    var div = '<div class="media-browser-fixed-popup">';
    div += '<div class="media-browser-fixed-popup-block">';
    div += '<div class="media-browser-fixed-popup-in">';
    div += '</div>';
    div += '<div class="media-browser-fixed-popup-btns">';
    div += '<button type="button" media-browser-fixed-popup-close>Close</button>';
    div += '<button type="button" class="media-browser-fixed-popup-btn" disabled>Choose</button>';
    div += '</div>';
    div += '</div>';
    div += '</div>';

    $('body').append(div);

    $(document).on('click', '[media-browser-show]', function () {
        media_browser_frame_item = $(this);
        var $popup = $('.media-browser-fixed-popup');
        var $block = $('.media-browser-fixed-popup-in');
        var select_type = $(this).attr('media-browser-show');

        if (select_type != undefined && select_type == 'multi') {
            media_browser_frame_choose = 'multi';
        }

        $block.empty();
        $popup.fadeIn();
        $('body').addClass('no-overflow');

        $.get(media_browser_url + "view", function (data) {
            if (data != undefined && data != '') {
                $('.media-browser-fixed-popup-in').html(data);

                if (!media_browser_called) {
                    mediaBrowserInit();
                } else {
                    mediaBrowserRun();
                }
            }
        });
    });

    $(document).on('click', '[media-browser-fixed-popup-close]', function () {
        $('.media-browser-fixed-popup').fadeOut();
        $('.media-browser-fixed-popup-btn').attr('disabled', 'disabled');
        $('body').removeClass('no-overflow');

        setTimeout(function () {
            $('.media-browser-fixed-popup-in').empty();
        }, 500);
    });

    $(document).on('click', '.media-browser-fixed-popup-btn', function () {
        var items = mediaBroserFrameSelectedItems();

        if (media_browser_frame_item != undefined && media_browser_frame_item.length > 0) {
            var parent = media_browser_frame_item.closest('.media-browser-frame-group');
            var input = parent.find('.media-browser-input');

            if (media_browser_frame_choose == 'image') {
                input.val(items[0]).trigger('change');
            } else if (media_browser_frame_choose == 'multi') {

            } else {
                input.val(items[0]).trigger('change');
            }

            $('[media-browser-fixed-popup-close]').trigger('click');
        } else {
            $('[media-browser-fixed-popup-close]').trigger('click');
        }
    });

    $(document).on('click', '.btn-image-clear', function () {
        var parent = $(this).closest('.media-browser-frame-group');
        var input = parent.find('.media-browser-input');
        var img_block = parent.find('.media-browser-input-img');

        if (input != undefined && input.length > 0) {
            input.val('').trigger('change');
            img_block.empty();
        }
    });

    $(document).on('change paste keyup', '.media-browser-input', function () {
        var value = $(this).val();
        var parent = $(this).closest('.media-browser-frame-group');
        var clear_btn = parent.find('.btn-image-clear');

        if (value != undefined && value != '') {
            clear_btn.show();
        } else {
            clear_btn.hide();
        }
    });

    $('.media-browser-input').each(function () {
        var value = $(this).val();
        var parent = $(this).closest('.media-browser-frame-group');
        var clear_btn = parent.find('.btn-image-clear');

        if (value != undefined && value != '') {
            clear_btn.show();
        } else {
            clear_btn.hide();
        }
    });

    $(document).on('change', '[media-browser-input="image"]', function () {
        var value = $(this).val();
        var allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'ico'];

        if (value != undefined && value != '') {
            var ext = value.substr(value.lastIndexOf('.') + 1);
            var parent = $(this).closest('.media-browser-frame-group');

            if (ext != undefined && allowed_exts.includes(ext)) {
                var img = '<a href="' + value + '" class="media-browser-image"><img src="' + value + '" alt="image"></a>';
                parent.find('.media-browser-input-img').html(img);
                $('.media-browser-image').magnificPopup({ type: 'image' });
            }
        }
    });

    $('[media-browser-input="image"]').each(function () {
        var value = $(this).val();
        var allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'ico'];

        if (value != undefined && value != '') {
            var ext = value.substr(value.lastIndexOf('.') + 1);
            var parent = $(this).closest('.media-browser-frame-group');

            if (ext != undefined && allowed_exts.includes(ext)) {
                var img = '<a href="' + value + '" class="media-browser-image"><img src="' + value + '" alt="image"></a>';
                parent.find('.media-browser-input-img').html(img);
                $('.media-browser-image').magnificPopup({ type: 'image' });
            }
        }
    });
}

function mediaBroserFrameSelectedItems() {
    var dirs = [];
    var files = [];
    var allowed = false;
    var objects = $('.media-browser-table').find('[media-browser-selected]');

    if (objects != undefined && objects.length > 0) {
        objects.each(function () {
            var value = $(this).attr('media-browser-file-url');

            if (value != undefined && value != '') {
                var type = $(this).attr('media-browser-select-item');

                if (type != undefined && type == 'file') {
                    files.push(value);
                } else {
                    dirs.push(value);
                }
            }
        });
    }

    if (files.length > 0 && dirs.length < 1) {
        if (media_browser_frame_choose == 'single' && files.length == 1) {
            allowed = true;
        } else if (media_browser_frame_choose == 'multi' && files.length > 0) {
            allowed = true;
        }
    }

    if (allowed) {
        return files;
    } else {
        return false;
    }
}

function mediaBroserPopupButtonDisable() {
    var items = mediaBroserFrameSelectedItems();
    var button = $('.media-browser-fixed-popup-btn');

    if (items) {
        button.removeAttr('disabled');
    } else {
        button.attr('disabled', 'disabled');
    }
}

function mbUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
}