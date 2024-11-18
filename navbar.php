<?php
function generateNavbar($activePage) {
    $menuItems = [
        'index' => 'Home',
        'about' => 'About Us',
        'book' => 'Book Appointment',
        'contact' => 'Contact Us',
        'admin' => 'Admin',
		'Our Cottages'=> 'Our Cottages',
		'Check Appointment'=>'Check Appointment'
    ];

    echo '<div class="navbar">';
    foreach ($menuItems as $key => $value) {
        $activeClass = ($activePage == $key) ? 'active' : '';
        echo '<a href="' . $key . '.php" class="' . $activeClass . '">' . $value . '</a>';
    }
    echo '</div>';
}

// Call the function with the current active page
generateNavbar(basename($_SERVER['PHP_SELF'], '.php'));
?>
       