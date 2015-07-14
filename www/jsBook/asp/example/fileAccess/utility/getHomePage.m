function contents=getHomePage(urlAddress)
% getHomePage: Get homepage from a given url address
%	Usage: contents = getHomePage(urlAddress)
%		contents: Retrieved contents
%		urlAddress: URL to get

%	This function uses Java to retrieve a homepage.
%	An easier alternative is to use "urlread" that comes with MATLAB 6.5

%	Roger Jang, 20030707

if nargin<1
	urlAddress = 'http://www.mathworks.com/support/tech-notes/1100/1109.shtml';
	urlAddress = 'http://neural.cs.nthu.edu.tw/jang';
end
fprintf('Getting homepage contents from "%s"...', urlAddress);

url = java.net.URL(urlAddress);
is = openStream(url);
isr = java.io.InputStreamReader(is);
br = java.io.BufferedReader(isr);

lineNum = 1;
while 1
	line = readLine(br);
	if isempty(line), break, end
	temp = cell(line);
	contents{lineNum} = xlate(temp{1});
%	fprintf('lineNum=%d\n', lineNum);
%	fprintf('line=%s\n', temp{1});
	lineNum = lineNum+1;
end

fprintf('	Done!');