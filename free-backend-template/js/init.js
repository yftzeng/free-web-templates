(function() {
  var init;

  init = function() {
    $("input[type=file]").customFileInput({
      button_position: "right"
    });
    $(".datepicker").datepicker();
    $(".chosen").css({
      width: '200px'
    }).chosen();
    $(".tags").textext({
      plugins: "tags prompt focus autocomplete ajax arrow",
      tagsItems: [],
      prompt: "Add one...",
      ajax: {
        url: "components/tags.json",
        dataType: "json",
        cacheResults: true
      }
    });
    $("table.datatable").dataTable({
      bJQueryUI: true,
      bRetrieve: true,
      sPaginationType: "full_numbers"
    });
    return $(".dialog.form").dialog({
      autoOpen: false,
      resizable: false,
      height: 600,
      width: 750,
      modal: true,
      close: function() {}
    });
  };

  $(function() {
    $(".accordion").accordion({
      header: "h3"
    });
    $(".tabs").tabs({
      load: init
    });
    $(".datepicker").datepicker();
    $(".button").button();
    return $('.tabs').on('click', '.edit', function(e) {
      e.preventDefault();
      $("#dialog:ui-dialog").dialog("destroy");
      return $(".dialog.form").load("components/form.html #form-demo", init).dialog("open");
    }).on('click', '.delete', function(e) {
      e.preventDefault();
      $("#dialog:ui-dialog").dialog("destroy");
      return $(".dialog.confirm").dialog({
        resizable: false,
        height: 180,
        modal: true,
        buttons: {
          "Yes": function() {
            return $(this).dialog("close");
          },
          "Cancel": function() {
            return $(this).dialog("close");
          }
        }
      });
    });
  });

}).call(this);
