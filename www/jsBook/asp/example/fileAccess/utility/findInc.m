function out = findInc(fileName)
%findInc: Find included files in a given C file
%	Usage: out = findInc(fileName)
%		fileName: file to be search
%		out: Included files in a cell string

%	Roger Jang, 20020101

fid = fopen(fileName);
if fid<0,
	error(sprintf('Cannot open "%s"!', fileName));
end

lineNum = 1;
while 1
	line = fgetl(fid);
	if ~isstr(line), break, end
	contents{lineNum} = xlate(line);
	lineNum = lineNum+1;
end
fclose(fid);

out = {};
for i=1:length(contents),
	line = contents{i};
	if ~isempty(line),
		pos = findstr(line, '#include "');
		if ~isempty(pos) & pos==1,
			temp = split(line, '"');
			out = {out{:}, temp{2}};
		end
	end
end










% Function for split
function tokenList = split(str, delimiter)
% SPLIT Split a string based on a given delimiter
%	Usage:
%	tokenList = split(str, delimiter)

%	Roger Jang, 20010324

tokenList = {};
remain = str;
i = 1;
while ~isempty(remain),
	[token, remain] = strtok(remain, delimiter);
	tokenList{i} = token;
	i = i+1;
end
