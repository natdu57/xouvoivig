if (Notification.permission === 'granted') {
    window.location.href='http://localhost/site/thank_notification.html'
}

else if (Notification.permission === 'denied' || Notification.permission === 'default') { 
    window.location.href='http://localhost/site/notification_google.html'
}