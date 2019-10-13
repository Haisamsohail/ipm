

</div>
</section>
    <!-- Vendor -->
    {{--<script src="{{ asset('/public/assets/vendor/jquery/jquery.js')}}"></script>--}}
        <script src="{{ asset('/public/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
        
        <!-- Theme Base, Components and Settings -->
        <script src="{{ asset('/public/assets/javascripts/theme.js')}}"></script>
        
        <!-- Theme Custom -->
        <script src="{{ asset('/public/assets/javascripts/theme.custom.js')}}"></script>
        
        <!-- Theme Initialization Files -->
        <script src="{{ asset('/public/assets/javascripts/theme.init.js')}}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('/public/assets/javascripts/theme.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('/public/assets/javascripts/theme.custom.js')}}"></script>
    
    <!-- Theme Initialization Files -->
    <script src="{{ asset('/public/assets/javascripts/theme.init.js')}}"></script>

    <script src="{{ asset('/public/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/public/js/moment.min.js')}}"></script>
    <script src="{{ asset('/public/js/daterangepicker.min.js')}}"></script>
<script>

    $(document).ready(function(evt)
    {
        $('input[name="daterange"]').daterangepicker({
            "showWeekNumbers": true,
            "showISOWeekNumbers": true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "alwaysShowCalendars": true,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

        // $.ajaxSetup({
        //     headers:
        //         { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        // });
        // $.ajax(
        //     {
        //         type:'POST',
        //         url:'HassanTest',
        //         data:
        //             {
        //                 taskID: "Test valuie"
        //             },
        //         success:function(data)
        //         {
        //             //var responseHSL = JSON.parse(data);
        //             // $("#taskID").val(responseHSL[0].taskID);
        //             //
        //             // $("#employeeName").val(responseHSL[0].employeeName);
        //             // $("#employeeEmail").val(responseHSL[0].employeeEmail);
        //             // $("#employeeCity").val(responseHSL[0].employeeCity);
        //             // var selectedValue = responseHSL[0].employeeERPUser;
        //         }
        //     });
    });

</script>


  </body>
</html>
