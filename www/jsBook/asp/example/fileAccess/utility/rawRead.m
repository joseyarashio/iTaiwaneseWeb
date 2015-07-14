function y = rawRead(rawFile)
% rawRead: Read a binary .raw file (e.g., for those dumped from AP170)
%	Usage: y = rawRead(rawFile)

fid=fopen(rawFile, 'r');
y=fread(fid, 'uchar');
fclose(fid);