<!DOCTYPE html>
<html lang="nl">
<head>

    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiota</title>

</head>

<body>

<div class="header">

    <img src="Media/kiota-logo.png" alt="Company Logo" class="logo">
    <div class="dropdown">

        <a class="active dropdown-toggle" href="#">Unit 1 - Joost Schouren</a>

        <div class="dropdown-content">
            <a href="#">Units</a>
            <a href="index.php">Unit 1 - Joost Schouren</a>
            <a href="unit2.php">Unit 2 - Dave</a>
            <a href="totaal.php">Totaal</a>
        </div>

    </div>

</div>
<div class="content">

    <div class="leftSide">

        <div class="sales card">
            <h2>Sales Omzet</h2>
            <p id="salesOmzetGET">Loading...</p>
            <button class="open-form-button">Invoeren</button>
        </div>

        <div class='total card'>
            <h2>Totale Omzet</h2>
            <p id="totaleOmzetGET">Loading...</p>
            <button class="open-form-button">Invoeren</button>
        </div>

    </div>

    <div class="resources card"">
        <h2>Resource Omzet</h2>
        <ul id="userList"></ul>
        <button class="open-form-button">Invoeren</button>
    </div>

    <div id="inputForm" class="form-card" style="display: none;">
        <form id="dataForm">
            <h3>Unit 1 - Joost</h3>
            <label for="omzet">Omzet:</label><br>
            <input type="text" id="" name="omzet"><br>
            <label for="userId">User ID:</label><br>
            <input type="text" id="userId" name="userId"><br>
            <input type="submit" value="Submit" class="submit-button">
            <button id="closeFormButton" class="open-form-button">Close</button>
        </form>
    </div>


    <!-- Sales Omzet Form -->
    <div id="salesInputForm" class="form-card sales-from-card" style="display: none;">
        <form id="salesDataForm">
            <h2 class="form-title">Sales omzet</h2>
            <h3>Unit 1 - Joost</h3>
            <label for="salesOmzet">Omzet:</label><br>
            <input type="text" id="salesOmzet" name="salesOmzet"><br>
            <button type="submit" class="submit-button">Submit</button>
            <button type="button" id="closeSalesFormButton" class="open-form-button">Close</button>
        </form>
    </div>

            <!-- Resource Omzet Form -->
            <div id="resourceInputForm" class="form-card resource-form-card" style="display: none">
                <form id="resourceDataForm">
                    <h2 class="form-title">Resource Omzet</h2>
                    <H3>Unit Joost</H3>
                    <label for="omzet">Omzet:</label><br>
                    <input type="text" id="omzet" name="omzet"><br>
                    <label for="userDropdown">User Name:</label>
                    <select id="userDropdown"></select>
                    <input type="submit" value="submit" class="submit-button">
                    <button type="button" id="closeResourceFormButton" class="open-form-button">Close</button>
                </form>
            </div>

    <!-- Totale Omzet Form -->
    <div id="totalInputForm" class="form-card" style="display: none;">
        <form id="totalDataForm">
            <h2 class="form-title">Totale omzet</h2>
            <h3>Unit Joost</h3>
            <label for="totalOmzet">Omzet:</label><br>
            <input type="text" id="totalOmzet" name="omzet"><br>
            <input type="submit" value="Submit" class="submit-button">
            <button type="submit" class="submit-button">Submit</button>
            <button type="button" id="closeTotalFormButton" class="open-form-button">Close</button>
        </form>
    </div>

    <div class="footer"></div>

    <script src="ResourceOmzetFormJoost.js"></script>
    <script src="SalesOmzetGetJoost.js"></script>
    <script src="TotaleOmzetGetJoost.js"></script>
    <script src="ResourceOmzetGetJoost.js"></script>
    <script src="SalesOmzetFormJoost.js"></script>
    <script src="TotaleOmzetFormJoost.js"></script>
</body>

</html>