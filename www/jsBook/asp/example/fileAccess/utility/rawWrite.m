function rawWrite(matrix, rawFile)
% rawWrite: Write data to a binary .raw file
%	Usage: rawWrite(matrix, rawFile)

fid=fopen(rawFile, 'w');
fwrite(fid, matrix, 'short');
fclose(fid);