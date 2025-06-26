const CACHE_NAME = 'iphone-manager-cache-v1';
const urlsToCache = [
  '/',
  '/index.php',
  '/css/style.css',
  '/js/main.js',
  '/icon-192.png',
  '/icon-512.png'
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME).then(cache => cache.addAll(urlsToCache))
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(response => response || fetch(event.request))
  );
});