function realCheckDigit=checkCreditCardNumber(number)
% checkCreditCardNumber Return the check digit of a given credit card number

%	Roger Jang, 20031010

checkDigit=number(end);
number(end)=[];
number=flipud(fliplr(number));

total=0;
for i=1:length(number)
	weight=rem(i,2)+1;
	temp=number(i)*weight;
	if temp>9
		temp=temp-9;
	end
	total=total+temp;
end
total

realCheckDigit=rem(total, 10);
if realCheckDigit~=0
	realCheckDigit=10-realCheckDigit;
end