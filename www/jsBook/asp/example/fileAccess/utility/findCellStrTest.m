% ���� findCellStr.dll ���Ϊk

C = {'hello', '�j��', 'yes', 'no', '�M��', 'goodbye', '�M��', 'hello'}';

pattern = '�M��';
index = findcellstr(C, pattern);
fprintf('The index of "%s" in "%s" is %s.\n', pattern, cell2str(C), mat2str(index));

C = sortrows(C);
index = findcellstr(C, pattern, 1);
fprintf('The index of "%s" in "%s" is %s.\n', pattern, cell2str(C), mat2str(index));