<script src="{{ asset('nifty/js/jquery.min.js') }} "></script>
<script src="{{ asset('nifty/js/bootstrap.min.js') }} "></script>
<script src="{{ asset('nifty/js/nifty.min.js') }} "></script>
<script src="{{ asset('nifty/js/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('nifty/js/dataTables/dataTables.bootstrap4.min.js') }}"></script> 

<script src="{{ asset('nifty/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('nifty/plugins/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('nifty/plugins/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('nifty/js/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('nifty/js/fullcalendar/moment.min.js') }}"></script>
<script src="{{ asset('nifty/js/daterangepicker/daterangepicker.js') }}"></script>
 
 

<script>
        $('.demo-chosen-select').chosen({width:'100%'});
        $('.demo-cs-multiselect').chosen({width:'100%'});
        $('input[name="daterange"]').daterangepicker();
        $('#data_5 .input-daterange').datepicker({
         
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
        });
        
         $("#monthPicker").datepicker({
                  format: "m/yyyy",
                  viewMode: "months", 
                  minViewMode: "months"
         });
</script>
<script>
        // $(document).ready(function(){
        //     $('.dataTables-example').DataTable({
        //         pageLength: 25,
        //         responsive: true,
        //         dom: '<"html5buttons"B>lTfgitp',
        //         buttons: [
        //             { extend: 'copy'},
        //             {extend: 'csv'},
        //             {extend: 'excel', title: 'ExampleFile'},
        //             {extend: 'pdf', title: 'ExampleFile'},

        //             {extend: 'print',
        //              customize: function (win){
        //                     $(win.document.body).addClass('white-bg');
        //                     $(win.document.body).css('font-size', '10px');

        //                     $(win.document.body).find('table')
        //                             .addClass('compact')
        //                             .css('font-size', 'inherit');
        //             }
        //             }
        //         ]

        //     });

        // });

        function getIPPData() {
         
           var user_id = $('#user').val();

           var start1 = $('#ippstartDate').val();
           var end1 = $('#ippendDate').val();


            $.ajax({
               type:'POST',
               url:'/reports/genipp',
               data:{ _token: '{{csrf_token()}}', user_id:user_id, start: start1, end:end1 },
               beforeSend:function(){
                  $(".loading").show();
               },
               success:function(data) {
                  $(".loading").hide();
                  $('#ticket-logged').show();
                  $('#IPPDATA').html(data.ippdata);
                  $('#ticket-logs').html(data.ticket_logged);

                            $('.IPPTable').DataTable({
                            pageLength: 25,
                            responsive: true,
                            dom: '<"html5buttons"B>lTfgitp',
                            buttons: [
                                {extend: 'copy'},
                                {extend: 'csv'},
                                {extend: 'excel', title: 'ExampleFile'},
                                {extend: 'pdf', title: 'ExampleFile'},

                                {extend: 'print',
                                customize: function (win){
                                        $(win.document.body).addClass('white-bg');
                                        $(win.document.body).css('font-size', '10px');

                                        $(win.document.body).find('table')
                                                .addClass('compact')
                                                .css('font-size', 'inherit');
                                }
                                }
                            ]

                        });
               }
            });
         }


         function getIPCData(){
            var categ = $('#category').val();
            var monthyear = $('#month').val();
            var montharr = monthyear.split('/');

            var month1 = montharr[0];
            var year1 = montharr[1];

            $.ajax({
               type:'POST',
               url:'/reports/genipc',
               data:{ _token: '{{csrf_token()}}', category:categ ,month:month1, year:year1},
               success:function(data) {
                  $('#IPCDATA').html(data.ipcdata);
                            $('.IPCTable').DataTable({
                            pageLength: 25,
                            responsive: true,
                            dom: '<"html5buttons"B>lTfgitp',
                            buttons: [
                                { extend: 'copy'},
                                {extend: 'csv'},
                                {extend: 'excel', title: 'ExampleFile'},
                                {extend: 'pdf', title: 'ExampleFile'},

                                {extend: 'print',
                                customize: function (win){
                                        $(win.document.body).addClass('white-bg');
                                        $(win.document.body).css('font-size', '10px');

                                        $(win.document.body).find('table')
                                                .addClass('compact')
                                                .css('font-size', 'inherit');
                                }
                                }
                            ]

                        });
               }
            });
         }

          function getILRData(){
            var categ = $('#category1').val();
            var start1 = $('#ilrstartDate').val();
            var end1 = $('#ilrendDate').val();
            $.ajax({
               type:'POST',
               url: "/reports/genilr",
               data:{ _token: '{{csrf_token()}}', category:categ, start:start1, end:end1},
               success:function(data) {
                  $('#ILRDATA').html(data.ilrdata);
                            $('.ILRTable').DataTable({
                            pageLength: 25,
                            responsive: true,
                            "order": [[ 3, "desc" ]],
                            dom: '<"html5buttons"B>lTfgitp',
                            buttons: [
                                { extend: 'copy'},
                                {extend: 'csv'},
                                {extend: 'excel', title: 'ExampleFile'},
                                {extend: 'pdf', title: 'ExampleFile'},

                                {extend: 'print',
                                customize: function (win){
                                        $(win.document.body).addClass('white-bg');
                                        $(win.document.body).css('font-size', '10px');

                                        $(win.document.body).find('table')
                                                .addClass('compact')
                                                .css('font-size', 'inherit');
                                }
                                }
                            ]

                        });
               }
            });
         }
</script>
