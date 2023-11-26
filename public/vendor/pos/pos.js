var ADDONVER, ADDONPOSIP, ADDONPOSID, ADDONOFFICE;
var BASE_URL = "";


//do everything after document is ready
$().ready(function () {

    $(window).on('message', function (event) {

        if (typeof event.originalEvent.data !== 'undefined')
        {

            var dataArray = event.originalEvent.data.toString().split("|");
            console.log('event.originalEvent.data', event.originalEvent.data);



            if (dataArray[1] === 'pg')
            {
                switch (dataArray[2])
                {
                    case 'payres':
                        $("#checkpos").hide();
                        var result = dataArray[3].split("#");   // cs|pg|payres|73000005#0
                        var hloResStatus = (result[0].length === 8) ? true : false; // cs|pg|payres|05951002307730000052000066397680000000030001399/01/25-10:55:27#45
                        var payResStatus = result[0].slice(3, 5);

                        console.log("check payres : "+result+" --  "+hloResStatus+" -- "+payResStatus);

                        if (!hloResStatus && payResStatus === '00')
                        {

                            var payResTrace = result[0].slice(5, 11);
                            var payResTermId = result[0].slice(11, 19);
                            var payResRRN = result[0].slice(19, 31);
                            var payResAmount = result[0].slice(31, 43);
                            console.log("verify pos res : "+payResTrace+"---"+payResTermId+"---"+payResRRN);

                            var msg = '<div style="direction:rtl;text-align:right;">پرداخت موفق<br/>مبلغ پرداختی: <span style="font-size:15px;">' + parseInt(payResAmount) + '</span><br/>شناسه پرداخت: <span style="font-size:15px;">' + payResRRN + '</span></div>';
                            $("#nopos").html(msg);
                            $("#nopos").show();

                            //verify payment ...
                            verifyPayment(result[1], payResTermId, payResRRN, payResTrace, payResAmount);

                        } else{

                            if (hloResStatus){

                                var msg;
                                if (result[0] != ADDONPOSID)
                                {
                                    msg = 'شناسه دستگاه کارتخوان با شناسه تنظیم شده در افزونه یکی نیست، لطفا شناسه ' + result[0] + ' را در تنظیمات افزونه وارد نمایید و سپس  مجددا سعی کنید.';
                                    $("#nopos").addClass("text-warning");
                                    Swal.fire({
                                        icon: "error",
                                        title: "خطا",
                                        text: "ارتباط با کارتخوان برقرار نیست",
                                        allowOutsideClick: false,
                                        confirmButtonText: "بستن",
                                    })
                                } else {
                                    msg = 'دستگاه کارتخوان با شناسه ' + result[0] + ' متصل است.';
                                    $("#nopos").addClass("text-success");
                                }
                                $("#nopos").html(msg);
                                $("#nopos").show();

                            } else{

                                var msg = 'خطای در زمان پرداخت با کارتخوان رخ داده لطفا مجددا سعی نمایید. کد خطا: ' + payResStatus  + ' لطفا پرداخت را از کارتابل پرداخت نشده ها ادامه دهید . ';
                                $("#nopos").html(msg);
                                $("#nopos").show();
                                payErr();
                                Swal.fire({

                                    title: 'خطا در پرداخت',
                                    text: msg,
                                    icon: 'error',
                                    confirmButtonText: 'بستن',
                                    allowOutsideClick: false,

                                }).then((result) => {
                                    if (result.isConfirmed) {

                                        window.location.replace(BASE_URL + "/notPayedRequests");

                                    }
                                })
                            }
                        }
                        break;
                    case 'conerr':
                        $("#checkpos").hide();
                        var msg;
                        if (dataArray[3].indexOf('2152398862') != -1)
                        {
                            msg = 'در صورتی که آدرس IP کارتخوان صحیح است، لطفا بررسی کنید که کارتخوان در حالت PC-POS باشد. (کارتخوان با فشردن کلید F2 به حالت PC-POS در می آید)';
                        }
                        $("#nopos").html('خطای برقراری ارتباط با کارتخوان<br/>' + dataArray[3] + '<br>' + msg);
                        Swal.fire({
                            icon: "error",
                            title: "خطا",
                            text: "ارتباط با کارتخوان برقرار نیست",
                            allowOutsideClick: false,
                            confirmButtonText: "بستن",
                        })
                        $("#nopos").show();

                        payErr();

                        /*Swal.fire({
                            title: 'خطای برقراری ارتباط با کارتخوان',
                            text: msg,
                            icon: 'error',
                            confirmButtonText: 'بستن'
                        });*/
                        break;
                    case 'isalive':
                        var resArray = dataArray[3].split('#');
                        ADDONVER = resArray[0];
                        ADDONPOSIP = resArray[1];
                        ADDONPOSID = resArray[2];
                        ADDONOFFICE = resArray[3];
                        $("#noaddon").hide();
                        $("#addonver").html(ADDONVER);
                        $("#addonposip").html(ADDONPOSIP);
                        $("#addonposid").html(ADDONPOSID);
                        $("#addonoffice").html(ADDONOFFICE);
                        $("#yesaddon").show();
                        $("#pospanel").show();
                        console.log("isalive case ... to see if pos is connected by saying hello....");
                        window.postMessage("pg|cs|pay|HELLO#0","*");
                        break;
                    case 'die':
                        updatePOSPanel('درخواست پایان کاربری به کارتخوان ارسال شد، در صورت تمایل به استفاده مجدد کلید F2 را از روی کارتخوان فشار دهید.');
                        window.postMessage("pg|cs|pay|EXIT#0", "*");
                        break;
                    case 'payrestest':

                        $("#checkpos").hide();
                        var result = dataArray[3].split("#");   // cs|pg|payres|73000005#0
                        var hloResStatus = (result[0].length === 8) ? true : false; // cs|pg|payres|05951002307730000052000066397680000000030001399/01/25-10:55:27#45
                        var payResStatus = result[0].slice(3, 5);

                        console.log("check payrestest : "+result+" --  "+hloResStatus+" -- "+payResStatus);

                        if (!hloResStatus && payResStatus === '00')
                        {

                            var payResTrace = result[0].slice(5, 11);
                            var payResTermId = result[0].slice(11, 19);
                            var payResRRN = result[0].slice(19, 31);
                            var payResAmount = result[0].slice(31, 43);
                            console.log("verify pos res : "+payResTrace+"---"+payResTermId+"---"+payResRRN);

                            var msg = '<div style="direction:rtl;text-align:right;">پرداخت موفق<br/>مبلغ پرداختی: <span style="font-size:15px;">' + parseInt(payResAmount) + '</span><br/>شناسه پرداخت: <span style="font-size:15px;">' + payResRRN + '</span></div>';
                            $("#nopos").html(msg);
                            $("#nopos").show();


                            verifyPaymentTest(result[1], payResTermId, payResRRN, payResTrace, payResAmount);


                        }
                    default:
                        console.log('توجه', dataArray[3]);
                }
            }
        }
    });
});
