    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
    <?php
    require_once("connection.php");
    $sql = "SELECT * FROM erth";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="container-fluid">
        <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>SOURCINGENTITY</th>
                    <th>VID</th>
                    <th>VendorName</th>
                    <th>Address</th>
                    <th>Address1</th>
                    <th>Address2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>ZipCode</th>
                    <th>Country</th>
                    <th>MainContact</th>
                    <th>MainEmail</th>
                    <th>MainPhone</th>
                    <th>FID</th>
                    <th>FactoryName</th>
                    <th>FAddress</th>
                    <th>FAddress1</th>
                    <th>FAddress2</th>
                    <th>FCity</th>
                    <th>FState</th>
                    <th>FZipCode</th>
                    <th>FCountry</th>
                    <th>FMainContact</th>
                    <th>FMainEmail</th>
                    <th>FMainPhone</th>
                    <th>Status</th>
                    <th>Style</th>
                    <th>StyleDes</th>
                    <th>Class</th>
                    <th>CRD</th>
                    <th>ETADC</th>
                    <th>Comments</th>
                    <th>Map</th>
                </tr>
            </thead>
            <tbody>
                <?PHP 
                   foreach($result as $data){ 
                ?>
                <tr>
                    <td><?php echo $data["SOURCINGENTITY"] ?></td>
                    <td><?php echo $data["VID"] ?></td>
                    <td><?php echo $data["VendorName"] ?></td>
                    <td><?php echo $data["Address"] ?></td>
                    <td><?php echo $data["Address1"] ?></td>
                    <td><?php echo $data["Address2"] ?></td>
                    <td><?php echo $data["City"] ?></td>
                    <td><?php echo $data["State"] ?></td>
                    <td><?php echo $data["ZipCode"] ?></td>
                    <td><?php echo $data["Country"] ?></td>
                    <td><?php echo $data["MainContact"] ?></td>
                    <td><?php echo $data["MainEmail"] ?></td>
                    <td><?php echo $data["MainPhone"] ?></td>
                    <td><?php echo $data["FID"] ?></td>
                    <td><?php echo $data["FactoryName"] ?></td>
                    <td><?php echo $data["FAddress"] ?></td>
                    <td><?php echo $data["FAddress1"] ?></td>
                    <td><?php echo $data["FAddress2"] ?></td>
                    <td><?php echo $data["FCity"] ?></td>
                    <td><?php echo $data["FState"] ?></td>
                    <td><?php echo $data["FZipCode"] ?></td>
                    <td><?php echo $data["FCountry"] ?></td>
                    <td><?php echo $data["FMainContact"] ?></td>
                    <td><?php echo $data["FMainEmail"] ?></td>
                    <td><?php echo $data["FMainPhone"] ?></td>
                    <td><?php echo $data["Status"] ?></td>
                    <td><?php echo $data["Style"] ?></td>
                    <td><?php echo $data["StyleDes"] ?></td>
                    <td><?php echo $data["Class"] ?></td>
                    <td><?php echo $data["CRD"] ?></td>
                    <td><?php echo $data["ETADC"] ?></td>
                    <td><?php echo $data["Comments"] ?></td>
                    <td><a href="http://localhost/map/new_chain.php?id=<?php echo $data["id"] ?>" target="_blank" class="btn btn-primary">View Map</a></td>
                </tr>
                <?PHP } ?>
            </tbody>
        </table>
                   </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>