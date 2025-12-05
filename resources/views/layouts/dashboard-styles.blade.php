
<!-- Contact Start -->

<style>
    #wrapper {
        overflow-x: hidden;
    }

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -250px;
        transition: margin .25s ease-out;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #page-content-wrapper {
        min-width: calc(100vw - 250px);
    }

    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -250px;
        }
    }
</style>
