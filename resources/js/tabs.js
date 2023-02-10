const headerItems = document.querySelectorAll('.tab-header-item');
const tabItems = document.querySelectorAll('.tab-item');
const element = document.querySelector(`[data-tab="${localStorage.activeTab}"]`);
element?.classList.add('active');
const activatedTab = document.querySelector(`#${localStorage.activeTab}`)?.classList.add('active');

headerItems.forEach(headerItem => {
  headerItem.addEventListener('click', () => {
    const tabId = headerItem.getAttribute('data-tab');
    const activeTab = document.querySelector('.tab-item.active');

    // Remove active class from current active tab
    activeTab.classList.remove('active');

    // Remove active class from current active header item
    headerItems.forEach(header => {
      header.classList.remove('active');
    });

    // Add active class to selected header item
    headerItem.classList.add('active');
    localStorage.activeTab = headerItem.getAttribute('data-tab')

    // Add active class to selected tab
    const selectedTab = document.querySelector(`#${tabId}`);
    selectedTab.classList.add('active');

  });
});
