using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Collections.ObjectModel;
using FinanX.Stocker.Infrastructure.Models;

namespace FinanX.Stocker.Infrastructure.Interfaces
{
    public interface IMarketHistoryService
    {
        ObservableCollection<TradeHistoryModel> GetStockHistoryInfo(string tikerSymbol);
    }
}
