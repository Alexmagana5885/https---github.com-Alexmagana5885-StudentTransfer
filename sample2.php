<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu with Account Settings</title>
    <style>
        /* Add some basic styling to the dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        #openPopupBtnS:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

<!-- Create the main dropdown -->
<div class="dropdown">
    <button>Account Settings</button>

    <a href="#">
                <span id="openPopupBtnS" class="title">Student Settings</span>
            </a>
    <div class="dropdown-content">
        <!-- Add your existing list items here -->
        <li>
            <a href="#">
                <span id="openPopupBtnS" class="title">Student Settings</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span id="openPopupBtnSS" class="title">School Settings</span>
            </a>
        </li>
    </div>
</div>

<!-- Add a new line with a paragraph -->
<p>This is a new line with some additional content.</p>

</body>
</html>
