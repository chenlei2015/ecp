(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[16], {
    YiZ1: function (e, t, a) {
        e.exports = {
            avatarHolder: "antd-pro-pages-account-center-center-avatarHolder",
            name: "antd-pro-pages-account-center-center-name",
            detail: "antd-pro-pages-account-center-center-detail",
            title: "antd-pro-pages-account-center-center-title",
            group: "antd-pro-pages-account-center-center-group",
            address: "antd-pro-pages-account-center-center-address",
            tagsTitle: "antd-pro-pages-account-center-center-tagsTitle",
            teamTitle: "antd-pro-pages-account-center-center-teamTitle",
            tags: "antd-pro-pages-account-center-center-tags",
            team: "antd-pro-pages-account-center-center-team",
            tabsCard: "antd-pro-pages-account-center-center-tabsCard"
        }
    }, zMb4: function (e, t, a) {
        "use strict";
        var n = a("TqRt"), l = a("284h");
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0, a("IzEo");
        var r = n(a("bx4M"));
        a("T2oS");
        var c = n(a("W9HT"));
        a("14J3");
        var u = n(a("BMrR"));
        a("jCWc");
        var d = n(a("kPKH"));
        a("Telt");
        var s = n(a("Tckk"));
        a("Pwec");
        var i = n(a("CtXQ"));
        a("5NDa");
        var o = n(a("5rEg"));
        a("+BJd");
        var f = n(a("mr32"));
        a("/zsF");
        var p, m, g, h = n(a("PArb")), E = n(a("RIqP")), v = n(a("lwsE")), b = n(a("W8MJ")), y = n(a("a1gu")),
            k = n(a("Nsbk")), T = n(a("PJYZ")), C = n(a("7W2i")), w = l(a("q1tI")), N = a("MuoO"), j = n(a("mOP9")),
            I = n(a("usdK")), P = n(a("v99g")), V = n(a("YiZ1")), z = (p = (0, N.connect)(function (e) {
                var t = e.loading, a = e.user, n = e.project;
                return {
                    listLoading: t.effects["list/fetch"],
                    currentUser: a.currentUser,
                    currentUserLoading: t.effects["user/fetchCurrent"],
                    project: n,
                    projectLoading: t.effects["project/fetchNotice"]
                }
            }), p((g = function (e) {
                function t() {
                    var e, a;
                    (0, v.default)(this, t);
                    for (var n = arguments.length, l = new Array(n), r = 0; r < n; r++) l[r] = arguments[r];
                    return a = (0, y.default)(this, (e = (0, k.default)(t)).call.apply(e, [this].concat(l))), a.state = {
                        newTags: [],
                        inputVisible: !1,
                        inputValue: ""
                    }, a.onTabChange = function (e) {
                        var t = a.props.match;
                        switch (e) {
                            case"articles":
                                I.default.push("".concat(t.url, "/articles"));
                                break;
                            case"applications":
                                I.default.push("".concat(t.url, "/applications"));
                                break;
                            case"projects":
                                I.default.push("".concat(t.url, "/projects"));
                                break;
                            default:
                                break
                        }
                    }, a.showInput = function () {
                        a.setState({inputVisible: !0}, function () {
                            return a.input.focus()
                        })
                    }, a.saveInputRef = function (e) {
                        a.input = e
                    }, a.handleInputChange = function (e) {
                        a.setState({inputValue: e.target.value})
                    }, a.handleInputConfirm = function () {
                        var e = (0, T.default)(a), t = e.state, n = t.inputValue, l = t.newTags;
                        n && 0 === l.filter(function (e) {
                            return e.label === n
                        }).length && (l = [].concat((0, E.default)(l), [{
                            key: "new-".concat(l.length),
                            label: n
                        }])), a.setState({newTags: l, inputVisible: !1, inputValue: ""})
                    }, a
                }

                return (0, C.default)(t, e), (0, b.default)(t, [{
                    key: "componentDidMount", value: function () {
                        var e = this.props.dispatch;
                        e({type: "user/fetchCurrent"}), e({
                            type: "list/fetch",
                            payload: {count: 8}
                        }), e({type: "project/fetchNotice"})
                    }
                }, {
                    key: "render", value: function () {
                        var e = this.state, t = e.newTags, a = e.inputVisible, n = e.inputValue, l = this.props,
                            p = l.listLoading, m = l.currentUser, g = l.currentUserLoading, E = l.project.notice,
                            v = l.projectLoading, b = l.match, y = l.location, k = l.children, T = [{
                                key: "articles",
                                tab: w.default.createElement("span", null, "\u6587\u7ae0 ", w.default.createElement("span", {style: {fontSize: 14}}, "(8)"))
                            }, {
                                key: "applications",
                                tab: w.default.createElement("span", null, "\u5e94\u7528 ", w.default.createElement("span", {style: {fontSize: 14}}, "(8)"))
                            }, {
                                key: "projects",
                                tab: w.default.createElement("span", null, "\u9879\u76ee ", w.default.createElement("span", {style: {fontSize: 14}}, "(8)"))
                            }];
                        return w.default.createElement(P.default, {className: V.default.userCenter}, w.default.createElement(u.default, {gutter: 24}, w.default.createElement(d.default, {
                            lg: 7,
                            md: 24
                        }, w.default.createElement(r.default, {
                            bordered: !1,
                            style: {marginBottom: 24},
                            loading: g
                        }, m && Object.keys(m).length ? w.default.createElement("div", null, w.default.createElement("div", {className: V.default.avatarHolder}, w.default.createElement("img", {
                            alt: "",
                            src: m.avatar
                        }), w.default.createElement("div", {className: V.default.name}, m.name), w.default.createElement("div", null, m.signature)), w.default.createElement("div", {className: V.default.detail}, w.default.createElement("p", null, w.default.createElement("i", {className: V.default.title}), m.title), w.default.createElement("p", null, w.default.createElement("i", {className: V.default.group}), m.group), w.default.createElement("p", null, w.default.createElement("i", {className: V.default.address}), m.geographic.province.label, m.geographic.city.label)), w.default.createElement(h.default, {dashed: !0}), w.default.createElement("div", {className: V.default.tags}, w.default.createElement("div", {className: V.default.tagsTitle}, "\u6807\u7b7e"), m.tags.concat(t).map(function (e) {
                            return w.default.createElement(f.default, {key: e.key}, e.label)
                        }), a && w.default.createElement(o.default, {
                            ref: this.saveInputRef,
                            type: "text",
                            size: "small",
                            style: {width: 78},
                            value: n,
                            onChange: this.handleInputChange,
                            onBlur: this.handleInputConfirm,
                            onPressEnter: this.handleInputConfirm
                        }), !a && w.default.createElement(f.default, {
                            onClick: this.showInput,
                            style: {background: "#fff", borderStyle: "dashed"}
                        }, w.default.createElement(i.default, {type: "plus"}))), w.default.createElement(h.default, {
                            style: {marginTop: 16},
                            dashed: !0
                        }), w.default.createElement("div", {className: V.default.team}, w.default.createElement("div", {className: V.default.teamTitle}, "\u56e2\u961f"), w.default.createElement(c.default, {spinning: v}, w.default.createElement(u.default, {gutter: 36}, E.map(function (e) {
                            return w.default.createElement(d.default, {
                                key: e.id,
                                lg: 24,
                                xl: 12
                            }, w.default.createElement(j.default, {to: e.href}, w.default.createElement(s.default, {
                                size: "small",
                                src: e.logo
                            }), e.member))
                        }))))) : "loading...")), w.default.createElement(d.default, {
                            lg: 17,
                            md: 24
                        }, w.default.createElement(r.default, {
                            className: V.default.tabsCard,
                            bordered: !1,
                            tabList: T,
                            activeTabKey: y.pathname.replace("".concat(b.path, "/"), ""),
                            onTabChange: this.onTabChange,
                            loading: p
                        }, k))))
                    }
                }]), t
            }(w.PureComponent), m = g)) || m), S = z;
        t.default = S
    }
}]);