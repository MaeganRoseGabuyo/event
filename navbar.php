
<!DOCTYPE html>
<html lang="en">
<body>
    
    <style>
/* Default Navbar Styling */
.navbar {
    width: 260px;
    background-color: #F4730B;
    color: #ffffff;
    display: flex;
    flex-direction: column;
    padding: 20px 10px;
    position: fixed;
    top: 0;
    bottom: 0;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
}

/* Make the toggle button visible on small screens */
@media (max-width: 768px) {
    .navbar ul {
        display: none; /* Hide navbar links by default on small screens */
    }

    .navbar.open ul {
        display: block; /* Show links when navbar is open */
    }

    .navbar-toggler {
        display: block;
        background-color: transparent;
        border: none;
        font-size: 2rem;
        color: #fff;
        cursor: pointer;
        position: fixed;
        top: 15px;
        left: 15px;
    }
}

.navbar-toggler {
    display: none; /* Hidden on large screens */
}

/* Add some padding to the body to prevent content from being hidden behind the navbar */
body {
    padding-left: 260px; /* Ensure body content is visible */
}

/* When navbar is open, display the navbar items */
.navbar.open {
    left: 0;
}


    .navbar img {
        height: 150px; 
        width: 150px; 
        margin-right: 20px; 
        margin-left: 50px;
    }

    .navbar h2 {
        font-size: 1.8rem;
        margin-bottom: 20px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        letter-spacing: 2px;
    }
    .navbar ul {
        list-style: none;
        padding: 0;
        margin: 0;
        width: 100%;
    }
    .navbar li {
        margin: 15px 0;
        text-align: center;
    }

    .navbar a {
        display: flex;
        margin-left: 20px;
        padding: 10px;
        color: black;
        font-size: 1rem;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .navbar a:hover {
        background: #e8e377;
        transform: scale(1.05);
    }

    .navbar a i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    footer {
        background-color: #e69b00;
        color: #fff;
        padding: 2px;
        text-align: center;
        position: fixed;
        width: 100%;
        bottom: 0;
        }

    </style>


    
</body>
</html>