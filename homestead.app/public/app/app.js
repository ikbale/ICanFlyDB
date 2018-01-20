//datepicker 
$(function () {
     $(".datepicker").datepicker({ 
                    autoclose: true, 
                    todayHighlight: true
              }).datepicker('update', new Date());;
            });
       
//Dropdownmenu
$(document).ready(function(){
            $('.dropdown-menu a').click(function(){
            $('.selected').text($(this).text());
          });
        });

$(".dropdown-menu li a").click(function(){
  var selText = $(this).text();
  $(this).parents('.btn').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
});


 //Menu Toggle Script 
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


//delete action
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $('a#jquery-postback').click(function(e){
            e.preventDefault(); 

            var $this = $(this);

            $.post({
                type: $this.data('method'),
                url: $this.attr('href')
            }).done(function (data) {
                alert('success');
                console.log(data);
            });
        });



/*$("#action").click(function(e){
        var selSelection = $(".typeEmp option").text();
        alert(selSelection);       
        if(!selSelection) $("#myTable tr").show();
        else $("#myTable tr").filter(function(){
            return $("td:eq(5)", this).html().indexOf(selSelection) == 2;
        }).hide();
});
*/
//sidebar menu-toggle
$(document).ready(function(){
        $('#sidebar-btn').click(function(){
            $('#sidebar').toggleClass('visible');
        });
    });