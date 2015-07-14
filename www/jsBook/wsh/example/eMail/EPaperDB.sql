if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[MailContent]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[MailContent]
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[MailSent]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[MailSent]
GO

CREATE TABLE [dbo].[MailContent] (
	[SystemSerialNum] [int] IDENTITY (1000, 1) NOT NULL ,
	[ContentFileName] [nvarchar] (255) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[RecordStatus] [nvarchar] (10) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[RecordCreatedDate] [datetime] NOT NULL ,
	[RecordCreatedByPerson] [nvarchar] (50) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[RecordModifiedDate] [datetime] NOT NULL ,
	[RecordModifiedByPerson] [nvarchar] (50) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL 
) ON [PRIMARY]
GO

CREATE TABLE [dbo].[MailSent] (
	[SystemSerialNum] [int] IDENTITY (1000, 1) NOT NULL ,
	[MailContentSystemSerialNum] [int] NOT NULL ,
	[EmailListTable] [nvarchar] (50) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[EmailTotal] [int] NOT NULL ,
	[SMTP] [nvarchar] (255) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[Sender] [nvarchar] (50) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[SenderEmail] [nvarchar] (255) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[Title] [nvarchar] (255) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[ContentType] [nvarchar] (10) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[EmailListFileName] [nvarchar] (255) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[StartDate] [datetime] NOT NULL ,
	[LastMailSentDate] [datetime] NULL ,
	[Remark] [ntext] COLLATE Chinese_Taiwan_Stroke_CI_AS NULL ,
	[SentStatus] [nvarchar] (10) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[RecordStatus] [nvarchar] (10) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[RecordCreatedDate] [datetime] NOT NULL ,
	[RecordCreatedByPerson] [nvarchar] (50) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL ,
	[RecordModifiedDate] [datetime] NOT NULL ,
	[RecordModifiedByPerson] [nvarchar] (50) COLLATE Chinese_Taiwan_Stroke_CI_AS NOT NULL 
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

ALTER TABLE [dbo].[MailContent] WITH NOCHECK ADD 
	CONSTRAINT [DF_EmailSubject_RecordStatus] DEFAULT ('有效') FOR [RecordStatus]
GO

ALTER TABLE [dbo].[MailSent] WITH NOCHECK ADD 
	CONSTRAINT [DF_MailSent_MailContentSystemSerialNum] DEFAULT (0) FOR [MailContentSystemSerialNum],
	CONSTRAINT [DF_MailSent_EmailTotal] DEFAULT (0) FOR [EmailTotal],
	CONSTRAINT [DF_MailSent_StartDate] DEFAULT ('1900/1/1') FOR [StartDate],
	CONSTRAINT [DF_MailSent_LastMailSentDate] DEFAULT ('1900/1/1') FOR [LastMailSentDate],
	CONSTRAINT [DF_MailSent_SentStatus] DEFAULT ('等待') FOR [SentStatus],
	CONSTRAINT [DF_MailSent_RecordStatus] DEFAULT ('有效') FOR [RecordStatus]
GO

