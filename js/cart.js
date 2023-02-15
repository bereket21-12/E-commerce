$('#quantity button').on('click', function() {
  var button = $(this);
  var oldValue = button.parent().find('input').val();
  if (button.hasClass('btn-plus')) {
    var newVal = parseFloat(oldValue) + 1;
    console.log("the value is " + newVal);
  } else {
    if (oldValue > 1) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 1;
    }
  }
  button.parent().find('input').val(newVal);
  var formData = new FormData(button.parent()[0]);
  $.ajax({
    url: "quantity.php",
    type: "POST",
    processData: false,
    contentType: false,
    data: formData,
    success: function(data) {
      console.log("Quantity updated successfully");
    },
    error: function() {
      console.log("Error updating quantity");
    }
  });
});
  