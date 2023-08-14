
function getFormData(form){
    formData = new FormData(form)
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });
    return data;
}
var data1 = getFormData(form1)
var data2 = getFormData(form1)
var data3 = getFormData(form1)
var data4 = getFormData(form1)
data=[data1,data2,data3,data4]



$('#create').on('click', function() {
   $.ajax({
    url: '{{route("admin.courses.store")}}',
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token if required
    },
    type: 'post', // send as POST
    data: data,
    success: function(response) {
        // Handle the response from the server
        console.log(response);
    },
    error: function(error) {
        // Handle errors, if any
        console.error(error);
    }
    });
});