<?php $this->view('student/layouts/header') ?>

    <div class="col-xs-12" style="padding-top: 20px; padding-bottom: 30px;">
        <?php if (isset($passengerid)) { ?>
            <?php foreach ($passengerid as $row) {
                $pid = $row->Passengerid;
            }
        }
        ?>
        <?php if ($pid == null) { ?>
            <p style="font-family: Questrial-Regular,serif; font-size: 20px; text-align: center; margin-top: 30px;">You
                haven't applied for the Transport facility</p>
        <?php } else { ?>
            <?php if ($activeroute != null) {
                foreach ($activeroute as $row) { ?>
                    <div class="col-xs-12"
                         style="border-radius: 10px; background: #ffffff;margin-top: 50px; border: 2px solid; padding: 0px; border-color: rgba(134, 134, 134, 0.17); margin-bottom: 30px; "
                         align="center">
                        <div class="col-xs-6"
                             style="padding: 0px; border-bottom: 1px solid; border-right: 1px solid; border-color: rgba(134, 134, 134, 0.17); padding-top: 10px;"
                             align="center">
                            <p style="font-family: Questrial-regular; font-size: 18px;">FROM</p>
                            <P style=" font-family: Rubik-Medium; font-size: 20px;"><?php echo $row->Firststation; ?></P>
                        </div>
                        <div class="col-xs-6"
                             style="border-bottom: 1px solid; border-color:rgba(134, 134, 134, 0.17); padding-top: 10px;"
                             align="center">
                            <p style=" font-family: Questrial-regular; font-size: 18px;">TO</p>
                            <p style=" font-family: Rubik-Medium; font-size: 20px;"><?php echo $row->Laststation; ?></p>
                        </div>
                        <div class="col-xs-6"
                             style="border-right: 1px solid; border-color:rgba(134, 134, 134, 0.17); padding-top: 10px; "
                             align="center">
                            <p style=" font-family: Questrial-regular; font-size: 18px;">DEPARTURE</p>
                            <P style=" font-family: Rubik-Medium; font-size: 18px;"><?php echo $row->Departuretime; ?></P>
                        </div>
                        <div class="col-xs-6" style="padding-top: 10px;" align="center">
                            <P style=" font-family: Questrial-regular;font-size: 18px;">ARRIVAL</P>
                            <p style=" font-family: Rubik-Medium; font-size: 18px;"><?php echo $row->Arrivaltime; ?></p>
                        </div>
                        <button style="color: white; font-size: 15px; background-color: #00CC00; font-family: Nunito_regular; padding: 10px 0 5px 0; border-radius: 15px; width: 50%; border: none; position: relative; top: 19px;">
                            ACTIVE NOW
                        </button>
                    </div>
                <?php }
            } ?>

            <div class="col-xs-12" style="padding-top: 20px;">
                <p style="font-family: Rubik-Medium; font-size: 20px; text-align: center;">ROUTE STATUS</p>
                <div class="col-xs-12"
                     style="border: 1px solid; border-radius: 4px; border-color: #B3B9BE; font-family: Questrial-Regular; font-size: 16px; padding: 10px; color: black;">
                    <?php if ($activeroute != null) { ?>
                        <?php foreach ($activeroute as $row) { ?>
                            <p>Your Status: <?php if ($row->Presence) { ?><span style="float: right; color: #00cc00">
                                On Board (<?php echo $row->updated_at?>)</span>
                                <?php }
                                else { ?>
                                    <span style="float: right;  color:#FF0000;">Off Board (<?php echo $row->updated_at?>)</span>
                                <?php } ?>
                            </p>
                            <p>Driver Name: <span style="float: right;"><?php echo $row->drivername; ?></span></p>
                            <p>Contact No: <span style="float: right;"><?php echo $row->Contact; ?></span></p>
                            <p>Started at: <span style="float: right;"><?php $time = date('h:i A',
                                        strtotime($row->Startedat));
                                    echo $time; ?></span></p>
                            <p>Address: <span style="float: right;"><?php echo $row->Address; ?></span></p>
                            <p>Bus Reg. No: <span style="float: right;"><?php if (isset($vehicle)) {
                                        echo $vehicle->regno;
                                    } ?></span></p>
                        <?php } ?>
                    <?php } else { ?>
                        <p>No route is active now.</p>
                    <?php } ?>
                </div>
            </div>

            <div class="col-xs-12" style="padding-top: 20px;">
                <p style="font-family: Rubik-Medium; font-size: 20px; text-align: center;">LAST ROUTE</p>
                <div class="col-xs-12"
                     style="border: 1px solid; border-radius: 4px; border-color: #B3B9BE; font-family: Questrial-Regular; font-size: 16px; padding: 10px; color: black;">
                    <?php if ($lastroute != null) {
                        foreach ($lastroute as $row) { ?>
                            <p>Route Started<span style="float: right;"><?php $stime = date('d M h:i A',
                                        strtotime($row->Startedat));
                                    echo $stime; ?></span></p>
                            <p>Reached at<span style="float: right;"><?php $etime = date('d M h:i A',
                                        strtotime($row->Reachedat));
                                    echo $etime; ?></span></p>
                            <p>Driver<span style="float: right;"><?php echo $row->drivername; ?></span></p>
                            <p>Bus No.<span style="float: right;"><?php if (isset($vehicle)) echo $vehicle->regno; ?></span></p>
                        <?php }
                    } else {
                        echo "No information available";
                    } ?>
                </div>
            </div>
            <div class="col-xs-12" style="padding-top: 20px;">
                <p style="font-family: Rubik-Medium; font-size: 20px; text-align: center;">ROUTE INFO</p>
                <div class="col-xs-12"
                     style="border: 1px solid; border-radius: 4px; border-color: #B3B9BE; font-family: Questrial-Regular; font-size: 16px; padding: 10px; color: black;">
                    <?php foreach ($info as $row) { ?>
                        <p>My Route<span style="float: right;"><?php echo $row->routename; ?></span></p>
                        <p>Station Name<span style="float: right;"><?php echo $row->stationname; ?></span></p>
                        <p>Arrival Time(Morning)<span style="float: right;"><?php echo $row->Morningtime; ?></span></p>
                        <p>Arrival Time(Evening)<span style="float: right;"><?php echo $row->Eveningtime; ?></span></p>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php $this->view('student/layouts/footer') ?>