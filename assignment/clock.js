
function displayTime() {
    
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const date = String(now.getDate()).padStart(2, '0');
    const hour = String(now.getHours()).padStart(2, '0');
    const minute = String(now.getMinutes()).padStart(2, '0');
    const second = String(now.getSeconds()).padStart(2, '0');

    const currentDate = `${year}/${month}/${date}`;
    const currentTime = `${hour}:${minute}:${second}`;
    document.querySelector('.clock-date').textContent = currentDate;
    document.querySelector('.clock-time') .textContent = currentTime;

};
document.addEventListener('DOMContentLoaded', () => {
  displayTime();
  setInterval(displayTime, 1000);
});