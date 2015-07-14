<html>
    <head>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <title>Vision Clab PerfectMoney Payment Processing</title>
    </head>
    
    <body>
        <form action="https://perfectmoney.is/api/step1.asp" method="post">
            <input type="hidden" name="PAYEE_ACCOUNT" value="U1503217">
            <input type="hidden" name="PAYEE_NAME" value="Vision Clab">
            <input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $price;?>">
            <input type="hidden" name="PAYMENT_UNITS" value="USD">
            <input type="hidden" name="STATUS_URL"  value="https://www.visionclab.com/user/perfectmoney/status">
            <input type="hidden" name="PAYMENT_URL" value="https://www.visionclab.com/user/perfectmoney/success">
            <input type="hidden" name="NOPAYMENT_URL" value="https://www.visionclab.com/user/perfectmoney/failure">
            <input type="hidden" name="BAGGAGE_FIELDS" value="USER_ID PACKAGE_TYPE TRANSACTION_ID">
            <input type="hidden" name="USER_ID" value="<?php echo $userid;?>">
            <input type="hidden" name="PACKAGE_TYPE" value="<?php echo $type;?>">
            <input type="hidden" name="TRANSACTION_ID" value="<?php echo $tin;?>">
            <input type="submit" id="mysubmit" name="PAYMENT_METHOD" value="PerfectMoney account">
         </form>
        
        <script type="text/javascript">
            $(document).ready(function(){$("#mysubmit").click();});
        </script>
    </body>
    
</html>