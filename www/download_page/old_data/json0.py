# encoding: utf-8
import sys
reload(sys)
sys.setdefaultencoding('utf-8')
import json
 
d = {
    'a': 1,
    'b': 'b',
    'list': [1,2,3],
    'dict': {'x':1, 'y':2},
    'tuple': (3, 'a')
}
 
print json.dumps(d)
# 容器的元素皆為 Python 內建型別，json.dumps() 可以自行處理。
 
class T1(object):
    def __init__(self, value):
        self.value = value
 
d = {
    'a': T1(1),  # 容器內的元素，有一個是自定型別
    'b': 'b',
    'list': [1,2,3],
    'dict': {'x':1, 'y':2},
    'tuple': (3, 'a')
}
 
try:
    print json.dumps(d)
except TypeError, err:
    print str(err)
#TypeError: <__main__.T1 object at 0x7fd6ffa7ee50> is not JSON serializable
 
# 1. 使用自定的序列化函數
def my_json_encode(o):
    #print type(o)
    if isinstance(o, T1):
        return o.value
    return json.JSONEncoder.default(self, obj)
 
print json.dumps(d, default=my_json_encode)
# json 模組會走訪容器的每個元素，當該元素的資料型態是 json.JSONEncoder 不認得的
# 資料型態時，該元素才會被傳遞給 default 參數指示的序列化函數處理。
# 在此例中， d.a 欄位之型態為自定類別 T1 ，故 d.a 將會被傳給 my_json_encode()。
 
# 2. 使用自定的編碼類別
class my_json_encoder(json.JSONEncoder):
    def default(self, o):
        return my_json_encode(o)
 
print json.dumps(d, cls=my_json_encoder)