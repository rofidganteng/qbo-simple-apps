{
    "_id" : ObjectId("5d6f8c3fcc84b95b49b01d76"),
    "userId" : "7715",
    "created" : ISODate("2019-09-04T10:04:47.568Z"),
    "changed" : ISODate("2019-09-04T10:04:47.568Z"),
    "current" : "G2",
    "company" : "macro event",
    "buyer" : "vwo buyer",
    "orderId" : ObjectId("5d6f8659cc84b95b49b01d6a"),
    "evaluateId" : ObjectId("5d6f85fbcc84b95b49b01d61"),
    "purchaseId" : ObjectId("5d6f84eccc84b95b49b01d4e"),
    "proposalId" : ObjectId("5d6f852fcc84b95b49b01d54"),
    "authorities" : [ 
        "7715", 
        "7717"
    ],
    "grReferenceNo" : "TBREFNO/VWB_41/040919/6/PO/1/GR/1",
    "formRevisionId" : 807,
    "currency" : "SGD",
    "creatorId" : "7715",
    "proxies" : [],
    "chain" : {
        "receipt" : [ 
            {
                "group" : "performGR",
                "rules" : [ 
                    {
                        "type" : "always",
                        "sendTo" : "purchaser"
                    }
                ],
                "options" : {
                    "fields" : {
                        "grReferenceNo" : {
                            "write" : true,
                            "visible" : true
                        },
                        "grDate" : {
                            "write" : true,
                            "visible" : true
                        },
                        "LDGETzdO3" : {
                            "write" : true,
                            "visible" : true
                        }
                    },
                    "cancel" : "7717"
                },
                "by" : [ 
                    "7715"
                ],
                "persons" : [ 
                    [ 
                        "7715"
                    ]
                ],
                "ccTo" : [],
                "votings" : [ 
                    null
                ]
            }, 
            {
                "group" : "submitInvoice",
                "rules" : [ 
                    {
                        "type" : "always",
                        "sendTo" : "purchaser"
                    }
                ],
                "options" : {
                    "fields" : {
                        "invoiceNo" : {
                            "write" : true,
                            "visible" : true
                        },
                        "invoiceDate" : {
                            "write" : true,
                            "visible" : true
                        },
                        "amount" : {
                            "write" : true,
                            "visible" : true
                        },
                        "attachments" : {
                            "write" : true,
                            "visible" : true
                        },
                        "0_YWVxzfX" : {
                            "write" : true,
                            "visible" : true
                        }
                    }
                },
                "by" : [ 
                    "7715"
                ],
                "persons" : [ 
                    [ 
                        "7715"
                    ]
                ],
                "ccTo" : [],
                "votings" : [ 
                    null
                ]
            }, 
            {
                "group" : "checking",
                "rules" : [ 
                    {
                        "type" : "always",
                        "sendTo" : [ 
                            "7717"
                        ],
                        "voting" : false
                    }
                ],
                "options" : {
                    "fields" : {
                        "grReferenceNo" : {
                            "visible" : true,
                            "write" : true
                        },
                        "grDate" : {
                            "visible" : true,
                            "write" : true
                        },
                        "VQhjvPle9" : {
                            "visible" : true,
                            "write" : true
                        },
                        "AvrvtJF3a" : {
                            "visible" : true,
                            "write" : true
                        },
                        "invoiceNo" : {
                            "visible" : true
                        },
                        "invoiceDate" : {
                            "visible" : true
                        },
                        "amount" : {
                            "visible" : true
                        },
                        "attachments" : {
                            "visible" : true
                        }
                    },
                    "ccTo" : {
                        "internal" : [ 
                            "7714"
                        ]
                    },
                    "cancel" : "7717",
                    "reject" : {
                        "action" : "Send Back"
                    }
                },
                "by" : [ 
                    "7717"
                ],
                "persons" : [ 
                    [ 
                        "7717"
                    ]
                ],
                "ccTo" : [],
                "votings" : [ 
                    false
                ]
            }
        ]
    },
    "placeholder" : {},
    "invoicing" : "attach",
    "lineItems" : {
        "JjXAUdToRo" : {
            "quantity" : 1,
            "price" : 20000
        }
    },
    "supplierContact" : {
        "name" : "tier1",
        "email" : "tbtestsupplier+tier1b2@gmail.com",
        "phone" : "12345"
    },
    "buyerContact" : {
        "name" : "Purchaser1",
        "email" : "tbtestbuy+purchaser1@gmail.com",
        "phone" : "33"
    },
    "gst" : 7,
    "deliveryCharges" : 0,
    "amount" : 21400,
    "grDate" : 1567530000,
    "invoiceNo" : "0034932984324",
    "invoiceDate" : 1567530000,
    "attachments" : [ 
        {
            "id" : "151040",
            "name" : "Screenshot from 2019-08-28 12-34-21.png"
        }
    ],
    "custom" : {
        "LDGETzdO3" : "Space X\nBoeing\nElectron"
    },
    "process" : {
        "receipt" : [ 
            {
                "step" : 0,
                "by" : {
                    "7715" : {
                        "status" : "completed",
                        "date" : ISODate("2019-09-04T10:04:47.524Z")
                    }
                },
                "ccTo" : []
            }, 
            {
                "step" : 1,
                "by" : {
                    "7715" : {
                        "status" : "completed",
                        "date" : ISODate("2019-09-04T10:04:47.524Z")
                    }
                },
                "ccTo" : []
            }, 
            {
                "step" : 2,
                "by" : {
                    "7717" : {}
                },
                "ccTo" : []
            }
        ]
    },
    "status" : "invoiced",
    "revisionId" : ObjectId("5d6f8c3fcc84b95b49b01d75")
}