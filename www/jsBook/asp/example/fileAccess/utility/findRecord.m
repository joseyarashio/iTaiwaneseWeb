function index = findRecord(record, field, fieldValue, exactMatch)
%findRecord: Find a record according to a field's value
%	Usage: index = findRecord(record, field, fieldValue, exactMatch)
%		index: Index of matched records
%		record: Record (structure array) to be matched
%		field: Which field to be matched
%		fieldValue: Value to be matched
%		exactMatch: 1 for exact match, 0 for substring match

%	Roger Jang, 20020406

if nargin<4, exactMatch=0; end

cmd=['{record.', field, '}'];
allFieldValue = eval(cmd);
if exactMatch==1,
	index = strmatch(upper(fieldValue), upper(allFieldValue), 'exact');
else
	for i=1:length(allFieldValue),
		index(i)=~isempty(findstr(upper(allFieldValue{i}), upper(fieldValue)));
	end
	index=find(index);
end