document.addEventListener("DOMContentLoaded", function () {

    // handle side menu
    var sideMenuToggleBtn = document.querySelector('.side-menu-toggle')
    var sideMenu = document.querySelector('.side-menu')
    var mainTag = document.querySelector('main')
    var overlay = document.createElement('DIV')
    overlay.classList.add('overlay')

    function showSide() {
        sideMenu.classList.remove('hide')
        if (window.innerWidth > 993) {
            mainTag.style.paddingRight = '280px'
        }
        if (window.innerWidth <= 992) {
            overlay.classList.add('show')
        }
    }

    function hideSide() {
        sideMenu.classList.add('hide')
            mainTag.style.paddingRight = 0
        if (window.innerWidth <= 992) {
            overlay.classList.remove('show')
        }
    }

    if (sideMenuToggleBtn && sideMenu) {
        document.querySelector('main').appendChild(overlay);

        sideMenuToggleBtn.addEventListener('click', function (e) {
            e.preventDefault()

            if (sideMenu.classList.contains('hide')) {
                showSide()
            } else {
                hideSide()
            }

        })
    }

    if (window.innerWidth <= 992 && sideMenuToggleBtn && sideMenu) {
        sideMenu.classList.add('hide')
    }

    if (window.innerWidth > 993 && sideMenuToggleBtn && sideMenu) {
        mainTag.style.paddingRight = '280px'
    }

    window.addEventListener('resize', function (event) {
        if (this.innerWidth <= 992 && sideMenuToggleBtn && sideMenu) {
            hideSide()
        }
        if (this.innerWidth > 993 && sideMenuToggleBtn && sideMenu) {
            showSide()
        }
    }, true);

    overlay.addEventListener('click', hideSide)
    // end

    // tooltipList
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    // end
})