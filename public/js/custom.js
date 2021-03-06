let data = () => {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
        return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
        !!window.matchMedia &&
        window.matchMedia('(prefers-color-scheme: dark)').matches
    )
}

function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
}

return {
    dark: getThemeFromLocalStorage(),
    toggleTheme() {
        this.dark = !this.dark
        setThemeToLocalStorage(this.dark)
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
        this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
        this.isSideMenuOpen = false
    },
    profile: false,
    toggleProfile() {
        this.profile = !this.profile
    },
    closeProfileMenu() {
        
    },
    
    isUsersMenuOpen: false,
    toggleUsersMenu() {
        this.isUsersMenuOpen = !this.isUsersMenuOpen
    },
    
    // Modal
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
        this.isModalOpen = true
        this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },
    closeModal() {
        this.isModalOpen = false
        this.trapCleanup()
    },
}
}