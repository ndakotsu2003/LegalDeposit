<style>

#navigation{
    display: flex;
    flex-direction: row;
    justify-content:space-evenly;
    background-color: blue;

 }
</style>

<header>
        <nav id="navigation">
            <div class="sec">
                <h2>LEGAL DEPOSIT</h2>
            </div>
            <div class="sec">
                <h2>DEPOSIT APPLICATION</h2>
            </div>
            <div class="sec">
                <p id="nametop">Welcome <?php echo $_SESSION['firstName'] ?></p>
            </div>
            <div id="b_top">
                <a href="logout.php"><button>Log Out</button></a>
</div>
        </nav>
    </header>
    