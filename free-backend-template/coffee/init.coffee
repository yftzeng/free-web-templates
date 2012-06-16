init = ->
  $("input[type=file]").customFileInput
    button_position: "right"
  $(".datepicker").datepicker()
  $(".chosen").css
    width: '200px'
  .chosen()
  $(".tags").textext
    plugins: "tags prompt focus autocomplete ajax arrow"
    tagsItems: []
    prompt: "Add one..."
    ajax:
      url: "components/tags.json"
      dataType: "json"
      cacheResults: true

  $("table.datatable").dataTable
    bJQueryUI: true
    bRetrieve: true
    sPaginationType: "full_numbers"

  $(".dialog.form").dialog
    autoOpen: false
    resizable: false
    height: 600
    width: 750
    modal: true
    close: ->

$ ->
  $(".accordion").accordion
    header: "h3"
  $(".tabs").tabs
    load: init
  $(".datepicker").datepicker()
  $(".button").button()
  $('.tabs').on 'click', '.edit', (e) ->
    e.preventDefault()
    $("#dialog:ui-dialog").dialog "destroy"
    $(".dialog.form").load("components/form.html #form-demo", init)
    .dialog "open"
  .on 'click', '.delete', (e) ->
    e.preventDefault()
    $("#dialog:ui-dialog").dialog "destroy"
    $(".dialog.confirm").dialog
      resizable: false
      height: 180
      modal: true
      buttons:
        "Yes": ->
          $(this).dialog "close"
        "Cancel": ->
          $(this).dialog "close"

