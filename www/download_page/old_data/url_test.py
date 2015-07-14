import urllib.request, urllib.error, urllib.parse
import urllib.response
import http.cookiejar
import gzip
import io

# proxy_cookie setting:
proxy_support = urllib.request.ProxyHandler({'http': 'http://140.109.18.117'})
cookie_support= urllib.request.HTTPCookieProcessor(http.cookiejar.CookieJar())

opener = urllib.request.build_opener(proxy_support, cookie_support, urllib.request.HTTPHandler)
urllib.request.install_opener(opener)

content = urllib.request.urlopen('http://140.109.18.117').read()

print(type(opener))
