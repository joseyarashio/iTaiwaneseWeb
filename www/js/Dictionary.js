/*
	作者：無涯 2007年3月27日 xrwang@126.com
	許可：在保留作者信息的前提下，本文件可以隨意修改、傳播、使用，但對可能由此造成的損失作者不負擔任何責任。
	Dictionary類：本類實現了字典功能，所有方法、屬性都模仿System..Collection.Generic.Dictionary類
	構造函數：
		Dictionary()
	屬性：
		CompareMode：比較模式，0——二進制   1——文本
		Count：字典中的項目數
		ThrowException：遇到錯誤時，是否拋出異常
	方法：
		Item(key)：獲取指定鍵對應的值
		Keys()：獲取鍵數組
		Values()：獲取值數組
		Add(key,value)：將指定的鍵和值添加到字典中
		BatchAdd(keys,values)：嘗試將指定的鍵和值數組添加到字典中，如果全部添加成功，返回true；否則返回false。
		Clear()：清除字典中的所有項
		ContainsKey(key)：字典中是否包含指定的鍵
		ContainsValue(value)：字典中是否包含指定的值
		Remove(key)：刪除字典中指定的鍵
		TryGetValue(key,defaultValue)：嘗試獲取字典中指定鍵對應的值，如果鍵不存在，返回默認值
		ToString()：返回字典中所有鍵和值組成的字符串，格式為「逗號分隔的鍵列表  分號  逗號分隔的值列表」
*/
function Dictionary()
{
    var me=this;            //將this指針保存到變量me中
	this.CompareMode=1;        //比較關鍵字是否相等的模式，0——二進制；1——文本
	this.Count=0;            //字典中的項目數
	this.arrKeys=new Array();    //關鍵字數組
	this.arrValues=new Array();    //值數組
	this.ThrowException=true;    //遇到錯誤時，是否用throw語句拋出異常
	this.Item=function(key)        //Item方法，獲取指定鍵對應的值。如果鍵不存在，引發異常
    {
        var idx=GetElementIndexInArray(me.arrKeys,key);
        if(idx!=-1)
        {
            return me.arrValues[idx];
        }
        else
        {
            if(me.ThrowException)
                throw "在獲取鍵對應的值時發生錯誤，鍵不存在。";
        }
    }
	this.Keys=function()        //獲取包含所有鍵的數組
    {
        return me.arrKeys;
    }
	this.Values=function()        //獲取包含所有值的數組
    {
        return me.arrValues;
    }
	this.Add=function(key,value)    //將指定的鍵和值添加到字典中
    {
        if(CheckKey(key))
        {
            me.arrKeys[me.Count]=key;
            me.arrValues[me.Count]=value;
            me.Count++;
        }
        else
        {
            if(me.ThrowException)
                throw "在將鍵和值添加到字典時發生錯誤，可能是鍵無效或者鍵已經存在。";
        }
    }
	this.BatchAdd=function(keys,values)        //批量增加鍵和值數組項，如果成功，增加所有的項，返回true；否則，不增加任何項，返回false。
    {
        var bSuccessed=false;
        if(keys!=null && keys!=undefined && values!=null && values!=undefined)
        {
            if(keys.length==values.length && keys.length>0)    //鍵和值數組的元素數目必須相同
            {
                var allKeys=me.arrKeys.concat(keys);    //組合字典中原有的鍵和新鍵到一個新數組
                if(!IsArrayElementRepeat(allKeys))    //檢驗新數組是否存在重複的鍵
                {
                    me.arrKeys=allKeys;
                    me.arrValues=me.arrValues.concat(values);
                    me.Count=me.arrKeys.length;
                    bSuccessed=true;
                }
            }
        }
        return bSuccessed;
    }
	this.Clear=function()            //清除字典中的所有鍵和值
    {
        if(me.Count!=0)
        {
            me.arrKeys.splice(0,me.Count);
            me.arrValues.splice(0,me.Count);
            me.Count=0;
        }
    }
	this.ContainsKey=function(key)    //確定字典中是否包含指定的鍵
    {
        return GetElementIndexInArray(me.arrKeys,key)!=-1;
    }
	this.ContainsValue=function(value)    //確定字典中是否包含指定的值
    {
        return GetElementIndexInArray(me.arrValues,value)!=-1;
    }
	this.Remove=function(key)        //從字典中移除指定鍵的值
    {
        var idx=GetElementIndexInArray(me.arrKeys,key);
        if(idx!=-1)
        {
            me.arrKeys.splice(idx,1);
            me.arrValues.splice(idx,1);
            me.Count--;
            return true;
        }
        else
            return false;
    }
	this.TryGetValue=function(key,defaultValue)    //嘗試從字典中獲取指定鍵對應的值，如果指定鍵不存在，返回默認值defaultValue
    {
        var idx=GetElementIndexInArray(me.arrKeys,key);
        if(idx!=-1)
        {
            return me.arrValues[idx];
        }
        else
            return defaultValue;
    }
	this.ToString=function()        //返回字典的字符串值，排列為： 逗號分隔的鍵列表  分號  逗號分隔的值列表
    {
        if(me.Count==0)
            return "";
        else
            return me.arrKeys.toString() + ";" + me.arrValues.toString();
    }
	function CheckKey(key)            //檢查key是否合格，是否與已有的鍵重複
    {
        if(key==null || key==undefined || key=="" || key==NaN)
            return false;
        return !me.ContainsKey(key);
    }
	function GetElementIndexInArray(arr,e)    //得到指定元素在數組中的索引，如果元素存在於數組中，返回所處的索引；否則返回-1。
    {
        var idx=-1;    //得到的索引
        var i;        //用於循環的變量
        if(!(arr==null || arr==undefined || typeof(arr)!="object"))
        {
            try
            {
                for(i=0;i<arr.length;i++)
                {
                    var bEqual;
                    if(me.CompareMode==0)
                        bEqual=(arr[i]===e);    //二進制比較
                    else
                        bEqual=(arr[i]==e);        //文本比較
                    if(bEqual)
                    {
                        idx=i;
                        break;
                    }
                }
            }
            catch(err)
            {
            }
        }
        return idx;
    }
	function IsArrayElementRepeat(arr)    //判斷一個數組中的元素是否存在重複的情況，如果存在重複的元素，返回true，否則返回false。
    {
        var bRepeat=false;
        if(arr!=null && arr!=undefined && typeof(arr)=="object")
        {
            var i;
            for(i=0;i<arr.length-1;i++)
            {
                var bEqual;
                if(me.CompareMode==0)
                    bEqual=(arr[i]===arr[i+1]);    //二進制比較
                else
                    bEqual=(arr[i]==arr[i+1]);        //文本比較
                if(bEqual)
                {
                    bRepeat=true;
                    break;
                }
            }
        }
        return bRepeat;
    }
}