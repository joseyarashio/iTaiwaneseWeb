% 代刚 findCellStr.dll ノ猭

C = {'hello', '厩', 'yes', 'no', '睲地', 'goodbye', '睲地', 'hello'}';

pattern = '睲地';
index = findcellstr(C, pattern);
fprintf('The index of "%s" in "%s" is %s.\n', pattern, cell2str(C), mat2str(index));

C = sortrows(C);
index = findcellstr(C, pattern, 1);
fprintf('The index of "%s" in "%s" is %s.\n', pattern, cell2str(C), mat2str(index));