var Main =
    {
        getStationApplyNo: function () {
            $.get("/CheckStation/{companyid}/{branchid}/{branchlocationid}",
                {
                    stationapplyno: $('#stationapplyno').val()
                },
                function (data) {
                    var parsedData = jQuery.parseJSON(data);    
                    // if(parsedData.message.data.length !== 0)
                    // {
                    //     Main.parsedResponse = parsedData.message.data;
                    console.info(parsedData);
                });
        }

    }

