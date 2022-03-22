<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>
</head>
<body>
<div id="reader" width="600px"></div>
<script>
    // function onScanSuccess(decodedText, decodedResult) {
    //     // handle the scanned code as you like, for example:
    //     console.log(`Code matched = ${decodedText}`, decodedResult);
    // }
    //
    // function onScanFailure(error) {
    //     // handle scan failure, usually better to ignore and keep scanning.
    //     // for example:
    //     console.warn(`Code scan error = ${error}`);
    // }
    //
    // let html5QrcodeScanner = new Html5QrcodeScanner(
    //     "reader",
    //     { fps: 10, qrbox: {width: 250, height: 250} },
    //     /* verbose= */ false);
    // html5QrcodeScanner.render(onScanSuccess, onScanFailure);

    const html5QrCode = new Html5Qrcode("reader");
    const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        /* handle success */
    };
    const config = { fps: 10, qrbox: { width: 250, height: 250 } };

    // If you want to prefer front camera
    html5QrCode.start({ facingMode: "user" }, config, qrCodeSuccessCallback);

    // If you want to prefer back camera
    html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);

    // Select front camera or fail with `OverconstrainedError`.
    html5QrCode.start({ facingMode: { exact: "user"} }, config, qrCodeSuccessCallback);

    // Select back camera or fail with `OverconstrainedError`.
    html5QrCode.start({ facingMode: { exact: "environment"} }, config, qrCodeSuccessCallback);

</script>
</body>
</html>