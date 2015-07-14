function contents = fileRead(fileName)
%fileRead: Read the contents of a file and put it into a cell string
%	Usage: contents = fileRead(fileName)
%		fileName: File to read
%		contents: File contents as a cell string

%	This function can be replaced by "textread", for example:
%	contents = textread('fft.m','%s','delimiter','\n');

%	Roger Jang, 20010218

if nargin==0, selfdemo; return; end

fid = fopen(fileName);
if fid<0,
	error('Cannot open file!');
end

contents=[];
lineNum = 1;
while 1
	line = fgetl(fid);
	if ~isstr(line)
		break;
	end
	contents{lineNum} = xlate(line);
	lineNum = lineNum+1;
end
fclose(fid);

% ====== self demo
function selfdemo
fileName = [mfilename, '.m'];
contents = feval(mfilename, fileName);
fprintf('The contents of "%s":\n', mfilename);
for i=1:length(contents),
	fprintf('%s\n', contents{i});
end